<?php

/*
 * this file will create shopify object class
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class PriceRule extends ShopifyObject {

    protected $SINGLE = "/admin/price_rules/{id}.json"; // get url for single
    protected $ALL = "admin/price_rules.json";         // url for getting all/create new
    protected $UPDATE = "admin/price_rules/{id}.json"; // url for update single
    protected $COUNT = "admin/price_rules/count.json"; // url for count
    protected $ARRAY_NAME = "price_rule";              // array name in update/create
    protected $is_having_primary_key = true;        // get is primary key in object or not
    
}
