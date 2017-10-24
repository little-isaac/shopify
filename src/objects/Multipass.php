<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Shopify\Objects;

class Multipass {

    private static $encryption_key;
    private static $signature_key;

    public static function redirect($shop_name, $multipass_secret, $customer_data_hash) {
        self::setup($multipass_secret);
        return redirect("https://" . $shop_name . "/account/login/multipass/" . self::generate_token($customer_data_hash));
    }

    private static function generate_token($customer_data_hash) {
        // Store the current time in ISO8601 format.
        // The token will only be valid for a small timeframe around this timestamp.
        $customer_data_hash["created_at"] = date("c");

        // Serialize the customer data to JSON and encrypt it
        $ciphertext = self::encrypt(json_encode($customer_data_hash));

        // Create a signature (message authentication code) of the ciphertext
        // and encode everything using URL-safe Base64 (RFC 4648)
        return strtr(base64_encode($ciphertext . self::sign($ciphertext)), '+/', '-_');
    }

    private static function setup($multipass_secret) {
        $key_material = hash("sha256", $multipass_secret, true);
        self::$encryption_key = substr($key_material, 0, 16);
        self::$signature_key = substr($key_material, 16, 16);
    }

    private static function encrypt($plaintext) {
        // Use a random IV
        $iv = openssl_random_pseudo_bytes(16);

        // Use IV as first block of ciphertext
        return $iv . openssl_encrypt($plaintext, "AES-128-CBC", self::$encryption_key, OPENSSL_RAW_DATA, $iv);
    }

    private static function sign($data) {
        return hash_hmac("sha256", $data, self::$signature_key, true);
    }

}
