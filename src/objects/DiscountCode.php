<?php

/*
 * this file will create shopify object class
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class DiscountCode extends ShopifyObject {

    protected $SINGLE = "admin/price_rules/{price_rule_id}/discount_codes/{id}.json"; // get url for single
    protected $UPDATE = "admin/price_rules/{price_rule_id}/discount_codes/{id}.json"; // url for update single
    protected $ALL = "admin/price_rules/{price_rule_id}/discount_codes.json";         // url for getting all/create new
    protected $COUNT = "admin/price_rules/{price_rule_id}/discount_codes/count.json"; // url for count
    protected $ARRAY_NAME = "discount_code";                                          // array name in update/create
    protected $is_having_primary_key = true;                                          // get is primary key in object or not

    public static function belongsTo($shop_name, $token, $price_rule_id = null, $data = null) {
        $discount_code = new DiscountCode($shop_name, $token, $data);
        if ($price_rule_id == null) {
            
        } else {
            $discount_code->SINGLE = "admin/price_rules/$price_rule_id/discount_codes/{id}.json";
            $discount_code->UPDATE = "admin/price_rules/$price_rule_id/discount_codes/{id}.json";
            $discount_code->ALL = "admin/price_rules/$price_rule_id/discount_codes.json";
            $discount_code->COUNT = "admin/price_rules/$price_rule_id/discount_codes/count.json";
        }
        return $discount_code;
    }

}
