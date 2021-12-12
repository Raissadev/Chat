<?php

namespace App\Controllers;
use App\mainView;

use App\Entity\User;
use App\Models\Friend;

class FriendsController
{

    public function acceptFriend(): void
    {
        $accept = Friend::acceptFriend($_POST['user_to'], 'accept');
        header('Refresh');
    }

    public function getFriends()
    {
        $friends = Friend::getFriends();
        return $friends;
    }

    public function requestNewFriend()
    {
        if(isset($_POST['new-friend'])){
            $newFriend = (new Friend)->newFriend($_POST['user_to'], $_SESSION['id'], "pending");
            header('Location: '.BASE.'/users');
        }
    }

}

?>