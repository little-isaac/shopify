<?php

/*
 * this file will create shopify object class
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class Test extends ShopifyObject {

    protected $SINGLE = "admin/products/{id}.json"; // get url for single
    protected $ALL = "admin/products.json";         // url for getting all/create new
    protected $UPDATE = "admin/products/{id}.json"; // url for update single
    protected $COUNT = "admin/products/count.json"; // url for count
    protected $ARRAY_NAME = "product";              // array name in update/create
    protected $is_having_primary_key = true;        // get is primary key in object or not
    
}
