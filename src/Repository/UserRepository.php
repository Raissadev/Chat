<?php

namespace src\Repository;

use App\Entity\User;
use src\Helper\MessagesDefault;
use DB;

class UserRepository
{

    private $table = 'users';

    protected static function schemaUser(): ?array
    {
        $user = DB::connect()->prepare("SELECT * FROM users WHERE id = $_SESSION[id]");
        $user->execute();
        $user = $user->fetch(\PDO::FETCH_ASSOC);
        return $user;
    }

    public static function schemaLogin(string $email, string $password)
    {
        $user = DB::connect()->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $user->execute(array($email, $password));
        $user = $user->fetch(\PDO::FETCH_ASSOC);
        return $user;
    }

    public static function schemaRegister($name, $email, $password, $image, $description, $slug)
    {
        $user = DB::connect()->prepare("INSERT INTO users (name, email, password, image, description, slug) VALUES (?,?,?,?,?,?)");
        $user->execute(array($name, $email, $password, $image['name'], $description, $slug));
        move_uploaded_file($image['tmp_name'],  BASE_IMAGES_USER . $image['name']);
        $id = DB::connect()->lastInsertId();
        if($user)
            return $id;
         else 
            return false;
    }

    protected function schemaUpdateUser($id, $name, $email, $password, $image, $description, $slug): bool
    {
        $updateAccount = DB::connect()->prepare("UPDATE users SET name = ?, email = ?, password = ?, image = ?, description = ?, slug = ? WHERE id = $id");
        $updateAccount->execute(array($name, $email, $password, $image['name'], $description, $slug));
        move_uploaded_file($image['tmp_name'],  BASE_IMAGES_USER . $image['name']);
        if($updateAccount)
            return true;
        else
            return false;
    }

}

?>