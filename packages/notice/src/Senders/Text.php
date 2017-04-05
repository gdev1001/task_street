<?php
/**
 * Created by PhpStorm.
 * User: bento
 * Date: 5/31/16
 * Time: 7:12 AM
 */

namespace Shokse\Notice\Senders;

use Illuminate\Support\Facades\Auth;
use Shokse\Notice\Model\NoticePersistent;

class Text extends Sender {

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function unread() {
        if ($this->config['text']) {
            return NoticePersistent::with('receiver', 'sender')
                ->Unread()
                ->where('receiver_id', Auth::user()->id)
                ->orderBy('id', 'desc')
                ->get();

        }
    }

    public function all() {
        if ($this->config['text']) {
            return NoticePersistent::with('receiver', 'sender')
                ->where('receiver_id', Auth::user()->id)
                ->orderBy('id', 'desc')
                ->get();
        }
    }
    
}