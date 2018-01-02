<?php

/*
 * this file will create shopify object class
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class Refund extends ShopifyObject {

    protected $SINGLE = "/admin/orders/{order_id}/refunds/{id}.json"; // get url for single
    protected $ALL = "/admin/orders/{order_id}/refunds.json";         // url for getting all/create new
    protected $UPDATE = "/admin/orders/{order_id}/refunds/{id}.json"; // url for update single
    protected $COUNT = "/admin/orders/{order_id}/refunds/count.json"; // url for count
    protected $CALCULATE = "/admin/orders/{order_id}/refunds/calculate.json"; // calculate refund price
    protected $ARRAY_NAME = "refund";              // array name in update/create
    protected $is_having_primary_key = true;        // get is primary key in object or not
    
    
    public static function belongsTo($shop_name, $token, $order_id, $data = null) {
        $refund = new Refund($shop_name, $token, $data);
        if ($order_id == null) {
            
        } else {
            $refund->SINGLE = "admin/orders/$order_id/refunds/{id}.json";
            $refund->UPDATE = "admin/orders/$order_id/refunds/{id}.json";
            $refund->ALL = "admin/orders/$order_id/refunds.json";
            $refund->COUNT = "admin/orders/$order_id/refunds/count.json";
        }
        return $refund;
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
}
