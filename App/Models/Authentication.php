<?php

namespace App\Models;

use App\Entity\User;
use src\Repository\UserRepository;
use App\Controllers\AuthenticationController;
use src\Authenticator\AuthenticatorUser;
use src\Helper\MessageAuth;
use DB;

class Authentication extends AuthenticatorUser
{

    protected static function login($email, $password): void
    {

        $user = UserRepository::schemaLogin($email, $password);

        if($user == false){
            header('Location: '.BASE.'/login');
            MessageAuth::defineMessage('error', 'Login inválido!');
            return;
        }

        $user = new User($user['id'], $user['name'], $email, $password, $user['image'], $user['description'], $user['slug']);
        $_SESSION['login'] = true;
        MessageAuth::defineMessage('success', 'Login efetuado com sucesso!');
        header('Location: '.BASE.'/');
    }

    public static function register($name, $email, $password, $image, $description, $slug): void
    {
        $verifyEmail = AuthenticatorUser::verifyEmail($email);
        $verifyPassword = AuthenticatorUser::verifyPassoword($password);
        $verifyImage = AuthenticatorUser::verifyImage($image);
        $verifyName = AuthenticatorUser::verifyName($name);

        if($verifyEmail !== true || $verifyPassword !== true || $verifyName !== true || $verifyImage !== true){
            header('Location: '.BASE.'/register');
            return;
        }

        $nameFile = $image['name'];
        $user = UserRepository::schemaRegister("$name", "$email", "$password", $image, "$description", "$slug");
        $id = DB::connect()->lastInsertId();

        if($user === false){
            header('Location: '.BASE.'/register');
            return;
        }

        $user = new User($id,"$name", "$email", "$password", $image['name'], "$description", "$slug");
        $_SESSION['login'] = true;
        header('Location: '.BASE.'');
    
    }

}