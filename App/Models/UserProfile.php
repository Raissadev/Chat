<?php

namespace App\Models;

use App\Entity\User;
use src\Repository\UserRepository;
use src\Helper\MessageAuth;

class UserProfile extends UserRepository
{

    public static function getUserProfile(): ?array
    {
        $user = (new UserRepository)->schemaUser();
        return $user;
    }

    public static function updateAccount($id, $name, $email, $password, $image, $description, $slug): void
    {

        if($name == '' || $password == '' || $description == '' || $slug == '' || $image == ''){
            header('Location: '.BASE.'/profile');
            MessageAuth::defineMessage('error', 'Preencha todos os campos!');
            return;
        }

        $user = (new UserRepository)->schemaUpdateUser($id, $name, $email, $password, $image, $description, $slug);

        if($user == false){
            header('Location: '.BASE.'/profile');
            MessageAuth::defineMessage('error', 'Erro ao atualizar inválido!');
            return;
        }

        $user = new User($id, "$name", "$email", "$password", $image['name'], "$description", "$slug");
    }

}