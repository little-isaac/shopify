<?php

/*
 * 
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class CustomCollections extends ShopifyObject {

    protected $SINGLE = "admin/custom_collections/{id}.json";
    protected $ALL = "admin/custom_collections.json";
    protected $UPDATE = "admin/custom_collections/{id}.json";
    protected $COUNT = "admin/custom_collections/count.json";
    protected $ARRAY_NAME = "custom_collections";
    protected $is_having_primary_key = true;

}
