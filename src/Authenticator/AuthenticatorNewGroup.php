<?php

namespace src\Authenticator;

use App\Entity\User;
use src\Helper\MessageAuth;

abstract class AuthenticatorNewGroup extends MessageAuth
{

    public static function verifyName(string $name)
    {
        $split = preg_split("/ /", $name);
        $caracteres = preg_match("/[\[^\'£$%^&*()}{@:\'#~?><>]]/", $name);
        if($caracteres == true AND !isset($split[1]) || $name == ''){
            MessageAuth::defineMessage('error', 'Name Inválido');
        }
        return true;
    }

    public static function verifyImage($image)
    {
        if($image == ''){
            MessageAuth::defineMessage('error', 'Precisa ser uma imagem válida');
            return;
        }
        return true;
    }

}

?>