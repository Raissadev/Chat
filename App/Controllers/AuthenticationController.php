<?php

namespace App\Controllers;
use App\mainView;

use App\Entity\User;
use App\Models\UserProfile;
use App\Models\Authentication;
use src\Repository\UserRepository;

class AuthenticationController extends Authentication
{

    public function signIn(): void
    {
        mainView::renderAuth('login', [  ]);
    }

    public function signUp()
    {
        mainView::renderAuth('register', [  ]);
    }

    public function signInAuth(): void
    {   
        $sendLogin = Authentication::login($_POST['email'], $_POST['password']);
    }

    public function signUpAuth(): void
    {   
        Authentication::register($_POST['name'], $_POST['email'], $_POST['password'], $_FILES['image'], $_POST['description'], $_POST['slug']);
    }

    public function updateAccount(): void
    {
        UserProfile::updateAccount($_SESSION['id'], $_POST['name'], $_SESSION['email'], $_POST['password'], $_FILES['image'], $_POST['description'], $_POST['slug']);
        header('Location: '.BASE.'');
    }

}

?>