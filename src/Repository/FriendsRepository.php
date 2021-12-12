<?php

namespace src\Repository;

use App\Entity\User;
use src\Helper\MessageAuth;
use DB;

class FriendsRepository
{

    private $table = 'friends';

    protected static function getUsersProfile($name)
    {
        $query = "";
        if($name){
            $query = "AND name LIKE '$name%'";
        }
        $usersResult = DB::connect()->prepare("SELECT * FROM users WHERE id != $_SESSION[id] $query");
        $usersResult->execute();
        $usersResult = $usersResult->fetchAll(\PDO::FETCH_ASSOC);
        return $usersResult;
    }

    protected static function getUsers()
    {
        $usersResult = DB::connect()->prepare("SELECT * FROM users WHERE id != $_SESSION[id]");
        $usersResult->execute();
        $usersResult = $usersResult->fetchAll(\PDO::FETCH_ASSOC);
        return $usersResult;
    }

    protected function schemaNewFriend(int $user_to, int $user_from, string $status): void
    {
        $friendRequest = DB::connect()->prepare("INSERT INTO friends (user_to, user_from, status) VALUES (?,?,?)");
        $friendRequest->execute(array($user_to, $user_from, $status));
        MessageAuth::defineMessage('success', 'Solicitação enviada com sucesso!');
    }

    protected function schemaAcceptFriend($user, $status): boll
    {
        $accept = DB::connect()->prepare("UPDATE friends SET status = ? WHERE user_to = $user AND user_from = $_SESSION[id]");
        $accept->execute(array($status));
        if($accept)
            return true;
        else
            return false;
    }

    protected static function getFriends()
    {
        $users = DB::connect()->prepare("SELECT * FROM friends RIGHT JOIN users ON users.id = friends.user_from WHERE user_from = $_SESSION[id]");
        $users->execute();
        $users = $users->fetchAll(\PDO::FETCH_ASSOC);
        return $users;
    }

}

?>