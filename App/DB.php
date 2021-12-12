<?php

    class DB
    {
        
        private static $sql;

        public static function connect()
        {
            if(self::$sql == null){
                try{
                    self::$sql = new PDO('pgsql:host='.HOST.';dbname='.DATABASE.'',''.USER.'',''.PASSWORD.'',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    self::$sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }catch(Exception $e){
                    echo 'Erro';
                }
            }
            return self::$sql;
        }

    }

?>