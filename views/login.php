<?php require 'components/flash-message.php'; ?>

<section class="container-authentication items-flex align-center just-center">
    <div class="wrap w40 w90-device-small">
        <form method="post" action="/login" class="form-auth w100">
            <input type="text" name="email" placeholder="Your email" />
            <input type="password" name="password" placeholder="Your password" />
            <button name="send" type="submit">Sign In</button>
        </form>
    </div>
</section>

