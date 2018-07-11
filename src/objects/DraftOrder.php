<?php

/*
 * this file will create shopify object class
 */

namespace Shopify\Objects;

use Shopify\ShopifyObject;
use Shopify\ShopifyApiException;
class DraftOrder extends ShopifyObject {

    protected $SINGLE = "admin/draft_orders/{id}.json"; // get url for single
    protected $ALL = "admin/draft_orders.json";         // url for getting all/create new
    protected $UPDATE = "admin/draft_orders/{id}.json"; // url for update single
    protected $COUNT = "admin/draft_orders/count.json"; // url for count
    protected $SEND_INVOICE = "admin/draft_orders/{id}/send_invoice.json"; // url for count
    protected $COMPLETE = "admin/draft_orders/{id}/complete.json"; // url for count
    protected $ARRAY_NAME = "draft_order";              // array name in update/create
    protected $is_having_primary_key = true;        // get is primary key in object or not

    function send_invoice() {
        try {
            $data = [];
            $data = [
                'draft_order_invoice' => $this->data
            ];
            $result = $this->call('POST', str_replace('{id}', $this->id, $this->SEND_INVOICE), $data);
            return $result;
        } catch (ShopifyApiException $ex) {
            $this->error = $ex->getMessage();
            return null;
        }
        return null;
    }

    function complete($payment_pending = false) {
        try {
            $data = [];
            if ($payment_pending) {
                $data = [
                    'payment_pending' => $payment_pending
                ];
            }
            $result = $this->call('PUT', str_replace('{id}', $this->id, $this->COMPLETE), $data);
            return $result;
        } catch (ShopifyApiException $ex) {
            $this->error = $ex->getMessage();
            return null;
        }
        return null;
    }

}
