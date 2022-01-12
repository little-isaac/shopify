<?php

/*
 * this file will create shopify object class
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class Order extends ShopifyObject {

    protected $SINGLE = "admin/orders/{id}.json"; // get url for single
    protected $ALL = "admin/orders.json";         // url for getting all/create new
    protected $UPDATE = "admin/orders/{id}.json"; // url for update single
    protected $COUNT = "admin/orders/count.json"; // url for count
    protected $ARRAY_NAME = "orders";              // array name in update/create
    protected $is_having_primary_key = true;        // get is primary key in object or not
    
}
