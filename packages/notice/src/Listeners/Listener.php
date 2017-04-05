<?php
/**
 * Created by PhpStorm.
 * User: bento
 * Date: 5/31/16
 * Time: 11:12 AM
 */
namespace Shokse\Notice\Listeners;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Shokse\Notice\Senders\Email;

abstract class Listener {

    protected $table = '';
    protected $config = '';

    protected function persist($data, $message) {

        $input = [];

        foreach ($data['receiver_ids'] as $id) {
            array_push($input, [
                'receiver_id'   => $id,
                'message'       => $message,
                'type'          => $data['content']['type'],
                'type_id'       => $data['content']['id'],
                'type_title'    => $data['content']['title'],
                'sender_id'     => Auth::user()->id,
                'status'        => 0,
                'created_at'    => Carbon::now()
            ]);
        }

        DB::table($this->table)->insert($input);

    }

    protected function send($data, $message)
    {
        if ($this->config['email']) {
            $recipients = User::whereIn('id', $data['receiver_ids'])->get();
            $send = new Email($this->config);
            $send->send($recipients, $message);
        }
    }

}
