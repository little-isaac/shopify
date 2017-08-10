<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;

class Shop extends ShopifyObject {

    protected $is_having_primary_key = false; 
    protected $SINGLE = "admin/shop.json";

}
