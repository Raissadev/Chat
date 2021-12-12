<?php require 'components/flash-message.php'; ?>

<section class="container-users w100 items-flex just-center">
    <div class="wrap w95">
        <form method="post" action="/users" class="margin-bottom-default items-flex just-space-between align-center">
            <a class="toggle hide-device-bigger margin-right-small"><i class="ri-menu-line"></i></a>
            <input type="text" name="name" placeholder="Search..." class="w80" autocomplete="off" />
            <button type="submit" name="search" class="btn-input w10 margin-left-small">Search</button>
        </form>
        <ul class="items-flex flex-wrap">
            <?php 
                foreach($data['users'] as $user){
            ?>
            <li class="box w22 margin-right-small margin-bottom-default">
                <figure class="img-default-user text-center">
                    <img src="<?= BASE ?>/storage/users/<?= $user['image'] ?>" />
                </figure>
                <div class="row margin-top-small text-center">
                    <div class="">
                        <h5><?= $user['name']; ?></h5>
                    </div>
                    <form method="post" action="/add-friend" class="buttons margin-top-small items-flex just-center">
                        <input type="hidden" name="user_to" value="<?= $user['id'] ?>" />
                        <button type="submit" name="new-friend" class="bg-black-very-weak w60 margin-right-small">Add Friend</button>
                        <a href="<?= BASE ?>/talk/<?= $user['id'] ?>" class="button bg-black-very-weak "><i class="ri-message-3-fill"></i></a>
                    </form>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
</section>

<div class="divisor"></div>