<?php

namespace src\Repository;

use App\Entity\User;
use DB;

class GroupRepository
{

    private $table = 'group';

    protected $users;

    protected static function getGroup($data): array
    {
        $group = DB::connect()->prepare("SELECT * FROM groups WHERE id = $data");
        $group->execute();
        $group = $group->fetch(\PDO::FETCH_ASSOC);
        return $group;
    }

    public static function getMyGroups(): ?array
    {
        $groups = DB::connect()->prepare("SELECT * FROM groups WHERE users LIKE '%$_SESSION[id]'");
        $groups->execute();
        $groups = $groups->fetchAll(\PDO::FETCH_ASSOC);
        return $groups;
    }

    protected static function getGroups($name): ?array
    {
        $query = "";
        if($name){
            $query = "WHERE name LIKE '$name%'";
        }
        $groups = DB::connect()->prepare("SELECT * FROM groups $query LIMIT 15");
        $groups->execute();
        $groups = $groups->fetchAll(\PDO::FETCH_ASSOC);
        return $groups;
    }

    protected function schemaMessagesGroup(): ?array
    {
        $messages = DB::connect()->prepare("SELECT * FROM chat");
        $messages->execute();
        $messages = $messages->fetchAll(\PDO::FETCH_ASSOC);
        return $messages;
    }

    protected function schemaCreateGroup(string $user, string $name, $image): void
    {
        $createGroup = DB::connect()->prepare("INSERT INTO groups (users, name, image) VALUES (?,?,?)");
        move_uploaded_file($image['tmp_name'],  BASE_IMAGES_GROUP . $image['name']);
        $createGroup->execute(array($user, $name, $image['name']));
    }

    protected static function schemaJoinTheGroup(int $group, string $users, $user): void
    {
        $lastUsers = $users . ',' . $user;
        $joinGroup = DB::connect()->prepare("UPDATE groups SET users = ? WHERE id = $group");
        $joinGroup->execute(array($lastUsers));
    }

}

?>