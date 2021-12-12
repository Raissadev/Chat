<?php

namespace App\Models;

use App\Entity\User;
use App\Models\Chat;
use src\Repository\MessagesRepository;
use src\Repository\GroupRepository;
use src\Authenticator\AuthenticatorNewGroup;
use src\Helper\MessageAuth;

class Group extends GroupRepository
{

    public static function getGroup($data): array
    {
        $group = GroupRepository::getGroup($data);
        return $group;
    }

    public static function getGroups($name): array
    {
        $groups = GroupRepository::getGroups($name);
        return $groups;
    }

    public function joinTheGroup($group, $users, $user): void
    {
        $participateGroup = (new GroupRepository)->schemaJoinTheGroup($group, $users, $user);
    }


    public function getMessagesGroup($data): ?array
    {
        $messages = (new GroupRepository)->schemaMessagesGroup($data);
        return $messages;
    }

    public function createGroup($user, $name, $image): void
    {
        $verifyName = AuthenticatorNewGroup::verifyName($name);
        $verifyImage = AuthenticatorNewGroup::verifyImage($image);

        if($verifyImage !== true || $verifyName !== true){
            header('Location: '.BASE.'/new-group');
            return;
        }

        MessageAuth::defineMessage('success', 'Grupo criado com sucesso!');
        $createGroup = (new GroupRepository)->schemaCreateGroup($user, $name, $image);
    }

}