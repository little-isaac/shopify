<?php

/*
 * this file will create shopify object class
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class Metafield extends ShopifyObject {

    protected $SINGLE = "admin/{belongsTo}/{belongsToId}/metafields/{id}.json"; // get url for single
    protected $ALL = "admin/{belongsTo}/{belongsToId}/metafields.json";         // url for getting all/create new
    protected $UPDATE = "admin/{belongsTo}/{belongsToId}/metafields/{id}.json"; // url for update single
    protected $COUNT = "admin/{belongsTo}/{belongsToId}/metafields/count.json"; // url for count
    protected $ARRAY_NAME = "metafield";              // array name in update/create
    protected $is_having_primary_key = true;        // get is primary key in object or not

    public static function belongsTo($shop_name, $token, $name = null, $id = null,$data = null) {
        $metafield = new Metafield($shop_name, $token,$data);
        if ($name == null) {
            $metafield->SINGLE = "admin/metafields/{id}.json";
            $metafield->ALL = "admin/metafields.json";
            $metafield->UPDATE = "admin/metafields/{id}.json";
            $metafield->COUNT = "admin/metafields/count.json";
            $metafield->is_having_primary_key = true;
        } else {
            switch ($name) {
                case 'articles':
                    break;
                default:
                    $metafield->SINGLE = str_replace("{belongsTo}", $name, $metafield->SINGLE);
                    $metafield->SINGLE = str_replace("{belongsToId}", $id, $metafield->SINGLE);

                    $metafield->UPDATE = str_replace("{belongsTo}", $name, $metafield->UPDATE);
                    $metafield->UPDATE = str_replace("{belongsToId}", $id, $metafield->UPDATE);

                    $metafield->ALL = str_replace("{belongsTo}", $name, $metafield->ALL);
                    $metafield->ALL = str_replace("{belongsToId}", $id, $metafield->ALL);
                    
                    $metafield->COUNT = str_replace("{belongsTo}", $name, $metafield->COUNT);
                    $metafield->COUNT = str_replace("{belongsToId}", $id, $metafield->COUNT);
                    break;
            }
        }
        return $metafield;
    }

}
