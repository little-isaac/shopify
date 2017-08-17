<?php

/*
 * this file will create shopify object class
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class Asset extends ShopifyObject {

    protected $SINGLE = "admin/assets/{id}.json"; // get url for single
    protected $ALL = "admin/assets.json";         // url for getting all/create new
    protected $UPDATE = "admin/assets/{id}.json"; // url for update single
    protected $COUNT = "admin/assets/count.json"; // url for count
    protected $ARRAY_NAME = "asset";              // array name in update/create
    protected $is_having_primary_key = false;     // get is primary key in object or not
   
    
}
