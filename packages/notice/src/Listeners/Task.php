<?php
/**
 * Created by PhpStorm.
 * User: bento
 * Date: 5/31/16
 * Time: 7:05 AM
 */

namespace Shokse\Notice\Listeners;

class Task extends Listener {

    public function __construct($config)
    {
        $this->config = $config;
        $this->table = $config['table'];
    }

    public function created($data)
    {
        $title = $data['content']['title'];
        $message = html_entity_decode("A task <b>$title</b> was posted in your fields");
        $this->persist($data, $message);
        $this->send($data, $message);
    }

    public function applied($data)
    {
        $title = $data['content']['title'];
        $message = html_entity_decode("A developer applied to your task <b>$title</b>");
        $this->persist($data, $message);
        $this->send($data, $message);
    }

    public function approved($data)
    {
        $title = $data['content']['title'];
        $message = html_entity_decode("Congratulations! You are selected into the task <b>$title</b>. Please completed in 48 hours");
        $this->persist($data, $message);
        $this->send($data, $message);
    }

    public function rejected($data)
    {
        $title = $data['content']['title'];
        $message = html_entity_decode("Sorry! You are not selected into the task <b>$title</b>.");
        $this->persist($data, $message);
        $this->send($data, $message);
    }

    public function submitted($data)
    {
        $title = $data['content']['title'];
        $message = html_entity_decode("A developer submitted a task <b>$title</b> to you. Please review the submission.");
        $this->persist($data, $message);
        $this->send($data, $message);
    }

    public function validated($data)
    {
        $title = $data['content']['title'];
        $message = html_entity_decode("Your submission of task <b>$title</b> is validated");
        $this->persist($data, $message);
        $this->send($data, $message);
    }

    public function completed($data)
    {
        $message = html_entity_decode("Congratulations! Your job is done! You will be paid in 24 hours");
        $this->persist($data, $message);
        $this->send($data, $message);
    }
    
}