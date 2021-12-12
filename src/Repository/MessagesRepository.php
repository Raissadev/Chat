<?php

namespace src\Repository;

use App\Entity\User;
use DB;

class MessagesRepository
{

    private $table = 'messages';

    public function schemaMessages(): ?array
    {
        $messages = DB::connect()->prepare("SELECT * FROM chat");
        $messages->execute();
        $messages = $messages->fetchAll(\PDO::FETCH_ASSOC);
        return $messages;
    }

    public function schemaMessagesTalk($data): ?array
    {
        $messages = DB::connect()->prepare("SELECT * FROM chat WHERE user_from = $_SESSION[id] AND user_to = $data");
        $messages->execute();
        $messages = $messages->fetchAll(\PDO::FETCH_ASSOC);
        return $messages;
    }

    public function schemaCreateMessage(string $user_to, int $user_from, string $message): void
    {
        $messages = "$message";
        $message = DB::connect()->prepare("INSERT INTO chat (user_to, user_from, message, date) VALUES (?,?,?,?)");
        $message->execute(array($user_to, $user_from, $messages, date('Y-m-d H:i:s')));
    }

}

?>