<?php
/**
 * Created by PhpStorm.
 * User: bento
 * Date: 5/31/16
 * Time: 7:01 AM
 */

namespace Shokse\Notice\Facades;

use Illuminate\Support\Facades\Facade;

class Notice extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'notice';
    }
}