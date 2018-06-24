<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Shopify;

use Shopify\QLObject;

class QL extends QLObject {

    protected $is_having_primary_key = false; 
    protected $SINGLE = "admin/api/graphql.json";

    
//    public function redirect($API, $SCOPES, $REDIRECT_URI){
//        $url = "https://".$this->shop_name."/admin/oauth/authorize?client_id=".$API."&scope=".$SCOPES."&redirect_uri=".$REDIRECT_URI;
//        return $url;
//    }
//    
//    public function get_access_token($API_KEY,$SCERET_KEY,$CODE){
//        $path = "/admin/oauth/access_token";
//        $params = [
//            "client_id"=>$API_KEY,
//            "client_secret" => $SCERET_KEY,
//            "code" => $CODE
//        ];
//        return $this->call("POST", $path,$params);
//    }
}
