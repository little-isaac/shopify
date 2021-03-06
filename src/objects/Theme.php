<?php

/*
 * this file will create shopify object class
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class Theme extends ShopifyObject {

    protected $SINGLE = "admin/themes/{id}.json"; // get url for single
    protected $ALL = "admin/themes.json";         // url for getting all/create new
    protected $UPDATE = "admin/themes/{id}.json"; // url for update single
    protected $COUNT = "admin/themes/count.json"; // url for count
    protected $ARRAY_NAME = "theme";              // array name in update/create
    protected $is_having_primary_key = true;        // get is primary key in object or not

}
