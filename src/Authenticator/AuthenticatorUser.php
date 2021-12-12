<?php

namespace src\Authenticator;

use App\Entity\User;
use src\Helper\MessageAuth;
use src\Exceptions\AuthenticatorException;

abstract class AuthenticatorUser extends MessageAuth
{

    protected static function verifyEmail(string $email)
    {
        $validation = filter_var($email, FILTER_VALIDATE_EMAIL);
        if($validation == false || $email == ''){
            MessageAuth::defineMessage('error', 'Email Incorreto');
            return;
        }
        return true;
    }

    protected static function verifyPassoword(string $password)
    {
        $pattern = "/([\d]{1})+([.]{1})+([A-Z]{0})/";
        $caracteres = preg_match($pattern, $password);
        if(strlen($password) > 8 && $caracteres == false || $password == ''){
            MessageAuth::defineMessage('error', 'Precisa ter mais de 8 letras!');
            return;
        }
        return true;
    }

    protected static function verifyImage($image)
    {
        if($image == ''){
            MessageAuth::defineMessage('error', 'Precisa ser uma imagem válida');
            return;
        }
        return true;
    }

    protected static function verifyName(string $name)
    {
        $split = preg_split("/ /", $name);
        $caracteres = preg_match("/[\[^\'£$%^&*()}{@:\'#~?><>]]/", $name);
        if($caracteres == true AND !isset($split[1]) || $name == ''){
            throw new AuthenticatorException($name);
        }
        return true;
    }

}

?>