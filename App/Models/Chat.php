<?php

namespace App\Models;

use App\Entity\User;
use src\Repository\MessagesRepository;
use src\Repository\TalkRepository;

class Chat extends MessagesRepository
{

    public static function getUserTalk($data): ?array
    {
        $user = (new TalkRepository)->schemaUserTalk($data);
        return $user;
    }

    public static function createMessage($user_to, $user_from, $message): void
    {
        $createMessage = (new MessagesRepository)->schemaCreateMessage($user_to, $user_from, "$message");
    }

    public static function countLinks($data, $talk): int
    {
        $countLinks = 0;
        if(isset($talk[$data])){
            if(str_contains('https://', $talk[$data]['message'])){
                $countLinks++;
            }
        }
        return $countLinks;   
    }

}