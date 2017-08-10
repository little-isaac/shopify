<?php

/*
 * 
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class ApplicationCharge extends ShopifyObject {
    
    protected $SINGLE = "admin/application_charges/{id}.json";
    protected $ALL = "admin/application_charges.json";
    protected $UPDATE = "admin/application_charges/{id}.json";
    protected $COUNT = "admin/application_charges/count.json";
    protected $ACTIVATE = "/admin/application_charges/{id}/activate.json";
    protected $ARRAY_NAME = "application_charge";
    protected $is_having_primary_key = true; 
    
}
