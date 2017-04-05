<?php
/**
 * Created by PhpStorm.
 * User: bento
 * Date: 5/31/16
 * Time: 7:05 AM
 */

namespace Shokse\Notice\Listeners;

use Illuminate\Support\Facades\Auth;

class Doc extends Listener {

    public $type;

    public function __construct($config, $type)
    {
        $this->type = $type;
        $this->config = $config;
        $this->table = $config['table'];
    }

    public function edited($data)
    {
        switch ($this->type) {
            case 'Project':
                if (Auth::user()->isExpertise) {
                    $message = html_entity_decode("The WIKI doc is edited by Company in xxx");
                    $this->persist($data, $message);
                }
                if (Auth::user()->isCompany) {
                    $message = html_entity_decode("The WIKI doc is edited by Expert in xxx");
                    $this->persist($data, $message);
                }
                break;
            case 'Task':
                if (Auth::user()->isExpertise) {
                    $message = html_entity_decode("The WIKI doc is edited by Developer in xxx");
                    $this->persist($data, $message);
                }
                if (Auth::user()->isStudent) {
                    $message = html_entity_decode("The WIKI doc is edited by Expert in xxx");
                    $this->persist($data, $message);
                }
                break;
            default:
                break;
        }

        $this->send($data, $message);
    }

    //Send notification about lock/unlock pages
    public function lockUnlock($data)
    {

        $page =  Page::find($data['content']['id']);
        if ($page->lock === 1) {
            $prepareMessage  = "User ".Auth::user()->name." want to unlock page ".$page->title.". <a href=".url($data['content']['name'].'/wiki/'.$data['content']['id'].'/unlock').">Click here to confirm</a>";
            $message = html_entity_decode($prepareMessage);
            unset($data['content']['name']);
            $this->persist($data, $message);
        }
        if ($page->lock === 0) {
            $prepareMessage  = "User \"".Auth::user()->name."\" want to lock page \"".$page->title."\". <a href=".url($data['content']['name'].'/wiki/'.$data['content']['id'].'/lock').">Click here to confirm</a>";
            $message = html_entity_decode($prepareMessage);
            unset($data['content']['name']);
            $this->persist($data, $message);
        }
    }


}