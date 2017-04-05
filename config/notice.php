<?php
/**
 * Created by PhpStorm.
 * User: bento
 * Date: 5/31/16
 * Time: 5:45 AM
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Notice table
    |--------------------------------------------------------------------------
    |
    | This table is used when persistent all notification into database
    | the default is 'notice' table, but you may use different table,
    | but don't forget to change the migration file to create the new table
    |
    */

    'table' => 'notifications',

    /*
    |--------------------------------------------------------------------------
    | Notice Type
    |--------------------------------------------------------------------------
    |
    | You can set which type to run in the system. When a type set to false
    | that type will not send any notification to receiver.
    |
    */

    'text'  => true,
    'email' => true,
    'flash' => true,

    /*
    |--------------------------------------------------------------------------
    | Email Sender Info
    |--------------------------------------------------------------------------
    |
    | You can set email sender information to display in the recipients
    |
    */

    'subject'   => 'Shokse Notification System',
    'sender'    => [
        'email' => 'Info@shokse.com',
        'name'  => 'Benyamin Maengkom'
    ],

];