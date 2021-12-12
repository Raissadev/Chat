<?php

namespace App\Models;
use src\Repository\FriendsRepository;
use src\Repository\UserRepository;

class Friend extends FriendsRepository
{

    public function newFriend($user_to, $user_from, $status): void
    {
        $newFriend = (new FriendsRepository)->schemaNewFriend($user_to, $user_from, "$status");
    }

    public static function getUsers(): ?array
    {
        $users = FriendsRepository::getUsers();
        return $users;
    }

    public static function getUsersProfile($name): ?array
    {
        $newFriend = FriendsRepository::getUsersProfile($name);
        return $newFriend;
        header('Location: '.BASE.'/users');
    }

    public static function getFriends(): array
    {
        $getFriends = FriendsRepository::getFriends();
        return $getFriends;
    }

    public static function acceptFriend($user, $status): void
    {
        $newFriend = (new FriendsRepository)->schemaAcceptFriend($user, $status);
    }


}

?>