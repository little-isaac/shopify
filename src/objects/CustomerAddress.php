<?php

/*
 * this file will create shopify object class
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class CustomerAddress extends ShopifyObject {

    protected $SINGLE = "admin/customers/{customer_id}/addresses/{id}.json"; // get url for single
    protected $ALL = "admin/customers/{customer_id}/addresses.json";         // url for getting all/create new
    protected $UPDATE = "admin/customers/{customer_id}/addresses/{id}.json"; // url for update single
    protected $COUNT = "admin/customers/{customer_id}/addresses/count.json"; // url for count
    protected $ARRAY_NAME = "address";              // array name in update/create
    protected $is_having_primary_key = true;        // get is primary key in object or not

    public static function belongsTo($shop_name, $token, $customer_id = null) {
        $customer_address = new CustomerAddress($shop_name, $token);
        if ($customer_id == null) {
            
        } else {
            $customer_address->SINGLE = "admin/customers/$customer_id/addresses/{id}.json";
            $customer_address->UPDATE = "admin/customers/$customer_id/addresses/{id}.json";
            $customer_address->ALL = "admin/customers/$customer_id/addresses.json";
            $customer_address->COUNT = "admin/customers/$customer_id/addresses/count.json";
        }
        return $customer_address;
    }

}
