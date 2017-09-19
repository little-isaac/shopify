<?php

/*
 * 
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class SmartCollections extends ShopifyObject {

    protected $SINGLE = "admin/smart_collections/{id}.json";
    protected $ALL = "admin/smart_collections.json";
    protected $UPDATE = "admin/smart_collections/{id}.json";
    protected $COUNT = "admin/smart_collections/count.json";
    protected $ARRAY_NAME = "smart_collections";
    protected $is_having_primary_key = true;

}
