<?php

namespace src\Exceptions;
use src\Helper\MessageAuth;

class AuthenticatorException extends \DomainException
{

    public function __construct(string $name)
    {
        $message = "Vai tentar hackear é? IMBECIL";
        self::treatment($message);
    }

    public function treatment($message): void
    {
        if($message){
            MessageAuth::defineMessage('error', $message);
            header('Location: '.BASE.'/exception-treatament');
        }
    }

}


?>