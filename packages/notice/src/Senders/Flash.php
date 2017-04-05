<?php
/**
 * Created by PhpStorm.
 * User: bento
 * Date: 5/31/16
 * Time: 7:12 AM
 */

namespace Shokse\Notice\Senders;

class Flash extends Sender {

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function get() {
        if ($this->config['text']) {
            $data = (new Text($this->config))->unread();

            foreach ($data as &$item) {
                $item->message = html_entity_decode($item->message);
            }

            $html =
                "<script>$(function() {
                var data = $data;
                for (var i=0; i < data.length; i++) {
                    doNotify(i, data[i].message)
                };

                function doNotify(i, message) {
                    setTimeout(function() {
                        noty({
                            width: 400,
                            text: message,
                            type: 'success',
                            dismissQueue: true,
                            timeout: 4000,
                            layout: 'bottomCenter',
                        })
                    }, (i+1) * 3000);
                };
            })</script>";

            return $html;
        }
    }
    
}