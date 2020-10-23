<?php

/*
 * 
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class RecurringApplicationCharge extends ShopifyObject {

    protected $SINGLE = "admin/recurring_application_charges/{id}.json";
    protected $ALL = "admin/recurring_application_charges.json";
    protected $UPDATE = "admin/recurring_application_charges/{id}.json";
    protected $COUNT = "admin/recurring_application_charges/count.json";
    protected $ACTIVATE = "/admin/recurring_application_charges/{id}/activate.json";
    protected $ARRAY_NAME = "recurring_application_charge";
    protected $is_having_primary_key = true; 
    
}