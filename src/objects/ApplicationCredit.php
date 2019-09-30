<?php

/*
 * 
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class ApplicationCredit extends ShopifyObject {

    protected $SINGLE = "admin/application_credits/{id}.json";
    protected $ALL = "admin/application_credits.json";
    protected $UPDATE = "admin/application_credits/{id}.json";
    protected $COUNT = "admin/application_credits/count.json";
    protected $ACTIVATE = "/admin/application_credits/{id}/activate.json";
    protected $ARRAY_NAME = "application_credit";
    protected $is_having_primary_key = true;

}
