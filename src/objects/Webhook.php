<?php

/*
 * this file will create shopify object class
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class Webhook extends ShopifyObject {

    protected $SINGLE = "admin/webhooks/{id}.json"; // get url for single
    protected $ALL = "admin/webhooks.json";         // url for getting all/create new
    protected $UPDATE = "admin/webhooks/{id}.json"; // url for update single
    protected $COUNT = "admin/webhooks/count.json"; // url for count
    protected $ARRAY_NAME = "webhook";              // array name in update/create
    protected $is_having_primary_key = true;        // get is primary key in object or not
    
}
