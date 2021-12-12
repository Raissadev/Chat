<?php

namespace src\Exceptions;
use src\Helper\MessageAuth;

class DatabaseException extends \DomainException
{

    public function __construct(string $message)
    {
        $message = "Erro ao conectar";
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