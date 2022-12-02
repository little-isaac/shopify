<?php

/*
 * this file will create shopify object class
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class AccessScope extends ShopifyObject {

    protected $ALL = "/admin/oauth/access_scopes.json"; // get url for single
    protected $ARRAY_NAME = "access_scopes";              // array name in update/create
    protected $is_having_primary_key = false;        // get is primary key in object or not

}
