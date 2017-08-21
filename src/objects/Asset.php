<?php

/*
 * this file will create shopify object class
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class Asset extends ShopifyObject {

    protected $SINGLE = "admin/assets.json"; // get url for single
    protected $ALL = "admin/assets.json";         // url for getting all/create new
    protected $UPDATE = "admin/assets.json"; // url for update single
    protected $COUNT = "admin/assets/count.json"; // url for count
    protected $ARRAY_NAME = "asset";              // array name in update/create
    protected $is_having_primary_key = false;     // get is primary key in object or not

    public static function belongsTo($shop_name, $token, $theme_id = null) {
        $asset = new Asset($shop_name, $token);
        if ($theme_id == null) {
            
        } else {
            $asset->SINGLE = "admin/themes/$theme_id/assets.json";
            $asset->UPDATE = "admin/themes/$theme_id/assets.json";
            $asset->ALL = "admin/themes/$theme_id/assets.json";
            $asset->COUNT = "admin/themes/$theme_id/assets.json";
        }
        return $asset;
    }

}
