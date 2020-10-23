<?php

/*
 * this file will create shopify object class
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class Page extends ShopifyObject {

    protected $SINGLE = "admin/pages/{id}.json"; // get url for single
    protected $ALL = "admin/pages.json";         // url for getting all/create new
    protected $UPDATE = "admin/pages/{id}.json"; // url for update single
    protected $COUNT = "admin/pages/count.json"; // url for count
    protected $ARRAY_NAME = "page";              // array name in update/create
    protected $is_having_primary_key = true;        // get is primary key in object or not
    
}
