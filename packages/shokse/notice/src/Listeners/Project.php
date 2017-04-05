<?php
/**
 * Created by PhpStorm.
 * User: bento
 * Date: 5/31/16
 * Time: 7:04 AM
 */

namespace Shokse\Notice\Listeners;

use Illuminate\Support\Facades\Auth;

class Project extends Listener {

    public function __construct($config)
    {
        $this->config = $config;
        $this->table = $config['table'];
    }

    public function created($data) 
    {
        $title = $data['content']['title'];
        $message = html_entity_decode("Project <b>$title</b> was created in your fields");
        $this->persist($data, $message);
        $this->send($data, $message);
    }

    public function taken($data) 
    {
        $title = $data['content']['title'];
        $message = html_entity_decode("Your project <b>$title</b> is taken by ".Auth::user()->name);
        $this->persist($data, $message);
        $this->send($data, $message);
    }

    public function breakdown($data) 
    {
        $title = $data['content']['title'];
        $message = html_entity_decode("The expert break down the project <b>$title</b>");
        $this->persist($data, $message);
        $this->send($data, $message);
    }

    public function delivered($data) 
    {
        $title = $data['content']['title'];
        $message = html_entity_decode("Project <b>$title</b> was delivered and completed. Please review the project");
        $this->persist($data, $message);
        $this->send($data, $message);
    }

    public function validated($data) 
    {
        $title = $data['content']['title'];
        $message = html_entity_decode("Project <b>$title</b> was validated. Thanks for your work");
        $this->persist($data, $message);
        $this->send($data, $message);
    }

    public function interview($data){
        $title = $data['content']['title'];
        $message = html_entity_decode("Project <b>$title</b> get request of interview. Thanks");
        $this->persist($data, $message);
        $this->send($data, $message);        
    }

    public function accept_interview($data){
        $title = $data['content']['title'];        
        $interview_time = $data['content']['time'];
        $interview_message = $data['content']['message'];

        $message = html_entity_decode("Your interview request of <b>$title</b> is accepted. 
                                        <p>Interview Time: $interview_time </p>
                                        <p>Client's message:</p>
                                        <p>$interview_message</p>");
        $this->persist($data, $message);
        $this->send($data, $message);        
    }
}