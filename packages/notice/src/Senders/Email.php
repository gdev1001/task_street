<?php
/**
 * Created by PhpStorm.
 * User: bento
 * Date: 5/31/16
 * Time: 7:12 AM
 */

namespace Shokse\Notice\Senders;

use Illuminate\Support\Facades\Mail;

class Email extends Sender {

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function send($recipients, $message) {
        if ($this->config['email']) {
            foreach ($recipients as $person) {
                $person['body'] = $message;
                Mail::send('notify.email', $person->toArray(), function($mail) use($person, $message) {
                    $mail->from($this->config['sender']['email'], $this->config['sender']['name']);
                    $mail->to($person->email, $person->name);
                    $mail->subject($this->config['subject']);
                });
            }
        }
    }
    
}