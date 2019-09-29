<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Shopify;

class ShopifyObject {

    private $client;
    private $shop_name;
    private $token;
    private $api_key;
    private $secret;
    private $response;
    public $data;
    private $error;
    private $call_limit = 41;
    private $last_call_limit = 30;
    private $sleep_on_limit = 10; // in sec

    function __construct($shop_name, $token, $data = null) {
        $this->shop_name = $shop_name;
        $this->token = $token;
        $this->api_key = config("shopify_object.key");
        $this->secret = config("shopify_object.secret");
        if ($data == null) {
            
        } else {
            $this->data = $data;
        }
    }

    function get($id = null, $str = []) {
        try {
            if ($this->is_having_primary_key && $id == null) {
                return null;
            }
            $data = [];
            if (!empty($str) && count($str) > 0) {
                $data = array_merge($data, $str);
            }
            $class = get_class($this);
            $res = $this->call('GET', str_replace("{id}", $id, $this->SINGLE), $data);
            $this->data = $res;
            return $this;
        } catch (ShopifyApiException $ex) {
            $this->error = $ex->getMessage();
            return null;
        }
        return null;
    }

    function all($page = 1, $limit = 250, $str = []) {
        try {
            $data = [];
            $data['page'] = $page;
            $data['limit'] = $limit;

            if (!empty($str) && count($str) > 0) {
                $data = array_merge($data, $str);
            }
            $products = $this->call('GET', $this->ALL, $data);
            $result = [];
            foreach ($products as $product) {
                $class = get_class($this);
                $result[] = new $class($this->shop_name, $this->token, $product);
            }
            return $result;
        } catch (ShopifyApiException $ex) {
            $this->error = $ex->getMessage();
            return null;
        }
        return null;
    }

    function update() {
        try {
            $data = [
                $this->ARRAY_NAME => $this->data
            ];
            $result = $this->call('PUT', str_replace('{id}', $this->id, $this->UPDATE), $data);
            $this->data = $result;
            return $this;
        } catch (ShopifyApiException $ex) {
            $this->error = $ex->getMessage();
            return null;
        }
        return null;
    }

    function count($str = []) {
        try {
            $data = [];

            if (!empty($str) && count($str) > 0) {
                $data = array_merge($data, $str);
            }
            $count = $this->call('GET', $this->COUNT, $data);
            return $count;
        } catch (ShopifyApiException $ex) {
            $this->error = $ex->getMessage();
            return null;
        }
        return null;
    }

    function delete($str = []) {
        try {
            $data = [];

            if (!empty($str) && count($str) > 0) {
                $data = array_merge($data, $str);
            }
            $this->call('DELETE', str_replace('{id}', $this->id, $this->SINGLE), $data);
            $this->data = null;
            return $this;
        } catch (ShopifyApiException $ex) {
            $this->error = $ex->getMessage();
            return null;
        }
        return null;
    }

    function create() {
        try {
            $data = [];
            $data = [
                $this->ARRAY_NAME => $this->data
            ];
            $result = $this->call('POST', $this->ALL, $data);
            $this->data = $result;
            return $this;
        } catch (ShopifyApiException $ex) {
            $this->error = $ex->getMessage();
            return null;
        }
        return null;
    }

    function activate() {
        try {
            $data = [];
            $data = [
                $this->ARRAY_NAME => $this->data
            ];
            $result = $this->call('POST', str_replace('{id}', $this->id, $this->ACTIVATE), $data);
            $this->data = $result;
            return $this;
        } catch (ShopifyApiException $ex) {
            $this->error = $ex->getMessage();
            return null;
        }
        return null;
    }

    function account_activation_url() {
        try {
            $data = [];
//            $data = [
//                $this->ARRAY_NAME => $this->data
//            ];
            $result = $this->call('POST', str_replace('{id}', $this->id, $this->ACCOUNT_ACTIVATION_URL), $data);
            return $result;
        } catch (ShopifyApiException $ex) {
            $this->error = $ex->getMessage();
            return null;
        }
        return null;
    }

    function calculate() {
        try {
            $data = [];
            $data = [
                $this->ARRAY_NAME => $this->data
            ];
            $result = $this->call('POST', str_replace('{id}', $this->id, $this->CALCULATE), $data);
            $this->data = $result;
            return $this;
        } catch (ShopifyApiException $ex) {
            $this->error = $ex->getMessage();
            return null;
        }
        return null;
    }

    public function __get($field) {
        if (property_exists($this, $field)) {
            return $this->$field;
        }
        if (isset($this->data[$field])) {
            return $this->data[$field];
        }
        return null;
    }

    public function __set($field, $value) {
        if (property_exists($this, $field)) {
            return $this->$field = $value;
        }
        $this->data[$field] = $value;
    }

    public function __isset($prop) {
        if (property_exists($this, $prop)) {
            return true;
        } if (isset($this->data[$prop])) {
            return true;
        } return false;
    }

    public function __toString() {
        return json_encode($this->data);
    }

    public function call($method, $path, $params = array()) {
        $baseurl = "https://{$this->shop_name}/";

        $url = $baseurl . ltrim($path, '/');
        $query = in_array($method, array('GET', 'DELETE')) ? $params : array();
        $payload = in_array($method, array('POST', 'PUT')) ? json_encode($params) : array();

        $request_headers = in_array($method, array('POST', 'PUT')) ? array("Content-Type: application/json; charset=utf-8", 'Expect:') : array();

// add auth headers
        $request_headers[] = 'X-Shopify-Access-Token: ' . $this->token;

        $response = $this->curlHttpApiRequest($method, $url, $query, $payload, $request_headers);
        $this->response = $response;
        $response = json_decode($response, true);
        if (isset($this->last_response_headers['x-shopify-shop-api-call-limit']) && !empty($this->last_response_headers['x-shopify-shop-api-call-limit'])) {
            $calls = intVal(trim(str_replace("/40", "", $this->last_response_headers['x-shopify-shop-api-call-limit'])));
            if ($calls >= $this->last_call_limit) {
                sleep($this->sleep_on_limit);
            }
        }
        if (isset($response['errors']) or ( $this->last_response_headers['http_status_code'] >= 400)) {
//            echo "\n\n";
            if ($this->last_response_headers['http_status_code'] == 429) {
//                dd($this->last_response_headers);
                sleep($this->sleep_on_limit);
                return $this->call($method, $path, $params);
            }
            throw new ShopifyApiException($method, $path, $params, $this->last_response_headers, $response);
        }
        return (is_array($response) and ( count($response) > 0)) ? array_shift($response) : $response;
    }

    private function curlHttpApiRequest($method, $url, $query = '', $payload = '', $request_headers = array()) {
        $url = $this->curlAppendQuery($url, $query);

        $ch = curl_init($url);
//        echo "<br>".$url;

        $this->curlSetopts($ch, $method, $payload, $request_headers);
        $response = curl_exec($ch);
        $errno = curl_errno($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($errno)
            throw new ShopifyCurlException($error, $errno);
        list($message_headers, $message_body) = preg_split("/\r\n\r\n|\n\n|\r\r/", $response, 2);
        $this->last_response_headers = $this->curlParseHeaders($message_headers);

        return $message_body;
    }

    private function curlAppendQuery($url, $query) {
        if (empty($query))
            return $url;
        if (is_array($query))
            return "$url?" . http_build_query($query);
        else
            return "$url?$query";
    }

    private function curlParseHeaders($message_headers) {
        $header_lines = preg_split("/\r\n|\n|\r/", $message_headers);
        $header_response = explode(' ', trim(array_shift($header_lines)), 3);

//        list(, $headers['http_status_code'], $headers['http_status_message']) = explode(' ', trim(array_shift($header_lines)), 3);
        $headers = array();
        $headers['http_status_code'] = (isset($header_response[1])) ? $header_response[1] : null;
        $headers['http_status_message'] = (isset($header_response[2])) ? $header_response[2] : null;

        foreach ($header_lines as $header_line) {
            list($name, $value) = explode(':', $header_line, 2);
            $name = strtolower($name);
            $headers[$name] = trim($value);
        }

        return $headers;
    }

    private function curlSetopts($ch, $method, $payload, $request_headers) {
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_USERAGENT, 'ohShopify-php-api-client');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        if (!empty($request_headers))
            curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);

        if ($method != 'GET' && !empty($payload)) {
            if (is_array($payload))
                $payload = http_build_query($payload);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        }
    }

    public function toArray($key = null) {
        if (!empty($key)) {
            return json_decode($this->toJson($key), true);
        }
        return json_decode($this->toJson(), true);
    }

    public function toJson($key = null) {
        if (!empty($key)) {
            if (gettype($this->$key) === "string") {
                return $this->$key;
            }
            return json_encode($this->$key);
        }
        return json_encode($this->data);
    }

}
