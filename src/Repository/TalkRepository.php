<?php

namespace src\Repository;

use App\Entity\User;
use DB;

class TalkRepository
{

    private $table = 'chat';

    public function schemaUserTalk($data): ?array
    {
        $user = DB::connect()->prepare("SELECT * FROM users WHERE id = $data");
        $user->execute();
        $user = $user->fetch(\PDO::FETCH_ASSOC);
        if(!$user){
            return [];
        }
        return $user;
    }

}

?>