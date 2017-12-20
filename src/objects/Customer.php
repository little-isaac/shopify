<?php

/*
 * 
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class Customer extends ShopifyObject {
    protected $SINGLE = "admin/customers/{id}.json";
    protected $ALL = "admin/customers.json";
    protected $UPDATE = "admin/customers/{id}.json";
    protected $COUNT = "admin/customers/count.json";
    protected $ARRAY_NAME = "customer";
    protected $ACCOUNT_ACTIVATION_URL = "admin/customers/{id}/account_activation_url.json";
    protected $is_having_primary_key = true; 
    
}
