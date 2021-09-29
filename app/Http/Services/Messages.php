<?php


namespace App\Http\Services;


class Messages
{
    public static $messages = [];

    public static function getMessage($key)
    {
        self::setMessages();

        if(isset(self::$messages[$key]))
            return self::$messages[$key];

        return 'Oops, there was some errors...';
    }

    public static function setMessages()
    {
        self::$messages = [
            'login_error' => 'Invalid login details',
            'reset' => 'Linked for reset password have been sent to your email',
        ];
    }
}
