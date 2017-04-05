<?php
/**
 * Created by PhpStorm.
 * User: bento
 * Date: 5/31/16
 * Time: 7:03 AM
 */

namespace Shokse\Notice;

use Config;
use Shokse\Notice\Listeners\Doc;
use Shokse\Notice\Listeners\Project;
use Shokse\Notice\Listeners\Task;
use Shokse\Notice\Model\NoticePersistent;
use Shokse\Notice\Senders\Flash;
use Shokse\Notice\Senders\Text;

class Notice
{

    public $config = array(
        'table'     => '',
        'email'     => '',
        'flash'     => '',
        'text'      => '',
    );

    public function __construct(array $config = array())
    {
        $this->configure($config);
        $this->table    = $this->config['table'];
        $this->email    = $this->config['email'];
        $this->flash    = $this->config['flash'];
        $this->text     = $this->config['text'];
    }

    /**
     * Overrides configuration settings
     *
     * @param array $config
     * @return $this
     */
    public function configure(array $config = array())
    {
        $this->config = array_replace($this->config, $config);
        return $this;
    }

    public function allread($id)
    {
        NoticePersistent::where('receiver_id', $id)->where('status', 0)->update(['status' => 1]);
    }

    public function project() 
    {
        return new Project($this->config);
    }

    public function task() 
    {
        return new Task($this->config);
    }

    public function doc($type) 
    {
        return new Doc($this->config, $type);
    }
    
    public function flash() 
    {
        return new Flash($this->config);
    }
    
    public function text()
    {
        return new Text($this->config);
    }

}