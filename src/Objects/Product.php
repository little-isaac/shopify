<?php

/*
 * 
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class Product extends ShopifyObject {

    protected $SINGLE = "admin/products/{id}.json";
    protected $ALL = "admin/products.json";
    protected $UPDATE = "admin/products/{id}.json";
    protected $COUNT = "admin/products/count.json";
    protected $ARRAY_NAME = "product";
    protected $is_having_primary_key = true; 
    
}
