<?php

namespace App\Models;

use App\Entity\User;
use App\Models\Chat;
use src\Repository\MessagesRepository;

class Talk extends Chat
{

    public function getMessagesTalk($data): ?array
    {
        $messages = (new MessagesRepository)->schemaMessagesTalk($data);
        return $messages;
    }

}