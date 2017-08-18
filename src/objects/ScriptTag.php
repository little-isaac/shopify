<?php

/*
 * 
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class ScriptTag extends ShopifyObject {

    protected $SINGLE = "admin/script_tags/{id}.json";
    protected $ALL = "admin/script_tags.json";
    protected $UPDATE = "admin/script_tags/{id}.json";
    protected $COUNT = "admin/script_tags/count.json";
    protected $ARRAY_NAME = "script_tag";
    protected $is_having_primary_key = true;
    
}
