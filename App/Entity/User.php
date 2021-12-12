<?php

namespace App\Entity;

use src\Repository\UserRepository;
use App\Models\UserProfile;

class User
{
    private ?int $id;
    private string $name;
    private string $password;
    private string $email;
    private string $image;
    private string $description;
    private string $slug;

    public function __construct(?int $id, string $name, string $email, string $password, $image, string $description, string $slug)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->image = $image;
        $this->description = $description;
        $this->slug = $slug;

        self::getId($id);
        self::getName($name);
        self::getEmail($email);
        self::getImage($image);
        self::getSlug($slug);
        self::getDescription($description);
        return $this;
    }

    public function getId(): string
    {
        $_SESSION['id'] = $this->id;
        return $_SESSION['id'];
    }

    public function getName(): string
    {
        $_SESSION['name'] = $this->name;
        return $_SESSION['name'];
    }

    public function getEmail(): string
    {
        $_SESSION['email'] = $this->email;
        return $_SESSION['email'];
    }

    public function getImage(): string
    {
        if(!file_exists(BASE.'/storage/users/'.$_SESSION['image'])){
            $_SESSION['image'] = 'avatar.png';
        }
        
        $_SESSION['image'] = $this->image;
        return $_SESSION['image'];
    }

    public function getSlug(): string
    {
        $_SESSION['slug'] = $this->slug;
        return $_SESSION['slug'];
    }

    public function getDescription(): string
    {
        $_SESSION['description'] = $this->description;
        return $_SESSION['description'];
    }

}

?>