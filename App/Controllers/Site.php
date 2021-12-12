<?php

namespace App\Controllers;
use App\mainView;

use App\Entity\User;
use App\Models\Chat;
use App\Models\Group;
use App\Models\Friend;
use App\Models\UserProfile;
use DB;

class Site
{

    public function home(): void
    {
        $users = Friend::getUsers();
        $usersPart = array_slice($users, 0, 3, true);
        $friends = Friend::getFriends();
        $groups = Group::getGroups("");
        $myGroups = Group::getMyGroups();
        mainView::render('home', [ 'users' => $users, 'friends' => $friends, 'usersPart' => $usersPart, 'groups' => $groups, 'myGroups' => $myGroups ]);
    }

    public function profile(): void
    {
        $user = UserProfile::getUserProfile();
        $users = Friend::getUsers();
        $usersPart = array_slice($users, 0, 3, true);
        $friends = Friend::getFriends();
        $groups = Group::getGroups("");
        $myGroups = Group::getMyGroups();
        mainView::render('profile', [ 'users' => $users, 'friends' => $friends, 'user' => $user, 'usersPart' => $usersPart, 'groups' => $groups, 'myGroups' => $myGroups ]);
    }

    public function users(): void
    {
        $users = isset($_POST['search']) ? Friend::getUsersProfile($_POST['name']) : Friend::getUsersProfile("");
        $usersPart = array_slice($users, 0, 3, true);
        $friends = Friend::getFriends();
        $groups = Group::getGroups("");
        $myGroups = Group::getMyGroups();
        mainView::render('users', [ 'users' => $users, 'friends' => $friends, 'usersPart' => $usersPart, 'groups' => $groups, 'myGroups' => $myGroups ]);
    }

    public function hackerTreatment(): void
    {
        mainView::renderAuth('hacker-treatment', []);
    }

}

?>