<?php

session_start();

require_once 'vendor/autoload.php';

date_default_timezone_set('America/Sao_Paulo');

define('BASE','http://localhost:8002');
define('BASE_STORAGE','http://localhost:8002/storage/');
define('BASE_IMAGES_USER', __DIR__ . '/storage/users/');
define('BASE_IMAGES_GROUP', __DIR__ . '/storage/groups/');
define('HOST','localhost');
define('DATABASE','database');
define('PASSWORD','root');
define('USER','postgres');

?>
