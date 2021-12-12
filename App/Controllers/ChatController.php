<?php

namespace App\Controllers;
use App\mainView;

use App\Entity\User;
use App\Models\Chat;
use App\Models\Talk;
use App\Models\Group;
use App\Models\Friend;

class ChatController
{

    public function talk($data): void
    {
        $users = Friend::getUsers();
        $usersPart = array_slice($users, 0, 3, true);
        $friends = Friend::getFriends();
        self::createMessage($data);
        $user = Chat::getUserTalk($data);
        $talk = (new Talk)->getMessagesTalk($data);
        $groups = Group::getGroups("");
        $myGroups = Group::getMyGroups();
        $countLinks = Chat::countLinks($data, $talk);
        mainView::renderTalk('talk', [ 'users' => $users, 'friends' => $friends, 'talk' => $talk, 'data' => $data, 'user' => $user, 'usersPart' => $usersPart, 'groups' => $groups, 'myGroups' => $myGroups, 'countLinks' => $countLinks ]);
    }

    public function group($data): void
    {
        $users = Friend::getUsers();
        $usersPart = array_slice($users, 0, 3, true);
        $friends = Friend::getFriends();
        self::createMessage($data);
        $user = Chat::getUserTalk($data);
        $groups = Group::getGroups("");
        $myGroups = Group::getMyGroups();
        $talk = (new Group)->getMessagesGroup($data);
        $group = Group::getGroup($data);
        $countLinks = Chat::countLinks($data, $talk);
        mainView::renderTalk('talk', [ 'users' => $users, 'friends' => $friends, 'talk' => $talk, 'data' => $data, 'user' => $user, 'usersPart' => $usersPart, 'groups' => $groups, 'myGroups' => $myGroups, 'group' => $group, 'countLinks' => $countLinks ]);
    }

    public function groups(): void
    {        
        $users = Friend::getUsers();
        $groups = isset($_POST['search']) ? Group::getGroups($_POST['name']) : Group::getGroups("");
        $usersPart = array_slice($users, 0, 3, true);
        $friends = Friend::getFriends();
        $myGroups = Group::getMyGroups();
        mainView::render('groups', [ 'users' => $users, 'friends' => $friends, 'usersPart' => $usersPart, 'groups' => $groups, 'myGroups' => $myGroups ]);
    }

    public function newGroup(): void
    {
        $users = Friend::getUsers();
        $usersPart = array_slice($users, 0, 3, true);
        $friends = Friend::getFriends();
        $groups = Group::getGroups("");
        $myGroups = Group::getMyGroups();
        mainView::render('new-group', [ 'users' => $users, 'friends' => $friends, 'usersPart' => $usersPart, 'groups' => $groups, 'myGroups' => $myGroups ]);
    }

    public function requestNewGroup(): void
    {
        if(isset($_POST['create'])){
            $createGroup = (new Group)->createGroup($_SESSION['id'], $_POST['name'], $_FILES['image']);
            header('Location: '.BASE.'/new-group');
        }
    }

    public function requestParticipateGroup(): void
    {
        if(isset($_POST['participate'])){
            $participateGroup = (new Group)->joinTheGroup($_POST['group'], $_POST['users'], $_POST['user']);
            header('Location: '.BASE.'/groups');
        }
    }

    public function createMessage()
    {
        if(isset($_GET['message'])){
            Chat::createMessage($_GET['user-to'], $_SESSION['id'], $_GET['message']);
        }
    }

}

?>