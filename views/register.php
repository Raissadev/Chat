<?php require 'components/flash-message.php'; ?>

<section class="container-authentication items-flex align-center just-center">
    <div class="wrap w40 w90-device-small">
        <form method="post" action="/register" enctype="multipart/form-data" class="form-auth w100">
            <input type="text" name="name" placeholder="Your name" />
            <input type="text" name="email" placeholder="Your email" />
            <input type="text" name="description" placeholder="Your description" />
            <input type="text" name="slug" placeholder="Your slug" />
            <input type="password" name="password" placeholder="Your password" />
            <input type="file" name="image" />
            <button name="send" type="submit">Sign Up</button>
        </form>
    </div>
</section>