<?php

/*
 * this file will create shopify object class
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class Checkout extends ShopifyObject {
    protected $SINGLE = "admin/checkouts/{id}.json"; // get url for single
    protected $UPDATE = "admin/checkouts/{id}.json"; // url for update single
    protected $ARRAY_NAME = "checkout"; // array name in update/create
    protected $COMPLETE_CHECKOUT = "admin/checkout/{id}/complete.json"; // complete a checkout
    protected $GET_SHIPPING_RATES = "admin/checkout/{id}/shipping_rates.json"; // get shipping rates from a checkout
    protected $is_having_primary_key = true; // get is primary key in object or not
}
