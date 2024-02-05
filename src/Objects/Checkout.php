<?php
/*
 * 
 */
namespace App\Classes\Shopify;
use Shopify\ShopifyObject;
class Checkout extends ShopifyObject {
    protected $SINGLE = "admin/checkouts/{id}.json";
    protected $UPDATE = "admin/checkouts/{id}.json";
    protected $ARRAY_NAME = "checkout";
    protected $COMPLETE_CHECKOUT = "admin/checkout/{id}/complete.json";
    protected $GET_SHIPPING_RATES = "admin/checkout/{id}/shipping_rates.json";
    protected $is_having_primary_key = true;
}
