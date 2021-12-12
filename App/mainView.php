<?php

namespace App;

class mainView
{

    public static function render($filename, $data = [], $header = 'views/theme/header.php', $footer = 'views/theme/footer.php' ): void
    {
        include($header);
        include("views/{$filename}.php");
        include($footer);
        die();
    }

    public static function renderTalk($filename, $data = [], $header = 'views/theme/header.php', $asideRight = 'views/components/aside-right.php', $headerTalk = 'views/components/header-talk.php', $footer = 'views/theme/footer.php' ): void
    {
        include($header);
        include($headerTalk);
        include("views/{$filename}.php");
        include($asideRight);
        include($footer);
        die();
    }

    public static function renderAuth($filename, $data = [], $header = 'views/theme/header-auth.php', $footer = 'views/theme/footer.php'): void
    {
        include($header);
        include("views/{$filename}.php");
        include($footer);
        die();
    }

}

?>