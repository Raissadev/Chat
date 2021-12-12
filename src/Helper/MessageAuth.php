<?php

namespace src\Helper;

abstract class MessageAuth
{

    public static function defineMessage(string $type, string $message)
    {
        $_SESSION['message'] = $message;
        $_SESSION['type'] = $type;
    }

}

?>