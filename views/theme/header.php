<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= BASE ?>/css/global.css" rel="stylesheet" />
    <link href="<?= BASE ?>/css/style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>MyCommunity</title>
</head>
<body>

<main class="items-flex">

<aside class="panel w22 items-flex h100 hide-device-small">
    <div class="wrap menu-panel w22">
        <div class="logo items-flex align-center just-center pos-relative margin-bottom-default">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav class="h100 menu">
            <ul class="h100 text-center">
                <li><a href="<?= BASE ?>/groups"><i class="ri-layout-masonry-fill"></i></a></li>
                <li><a href="<?= BASE ?>"><i class="ri-phone-fill"></i></a></li>
                <li><a href="<?= BASE ?>/talk/<?= $_SESSION['id'] ?>"><i class="ri-message-3-fill"></i></a></li>
                <li><a href="<?= BASE ?>/users"><i class="ri-folder-reduce-fill"></i></a></li>
                <li><a href="<?= BASE ?>/profile"><i class="ri-settings-4-fill"></i></a></li>
                <li class="hide-device-bigger toggle"><a><i class="ri-arrow-left-line"></i></a></li>
            </ul>
        </nav>
    </div>
    <div class="wrap infos-panel">
        <div class="col margin-bottom-default">
            <div class="row items-flex align-center">
                <figure class="img-small-user margin-right-tiny">
                    <img src="<?= BASE_STORAGE ?>users/<?= $_SESSION['image'] ?>"  class="pos-relative" />
                </figure>
                <div>
                    <h6 class="margin-bottom-tiny"><?= $_SESSION['name'] ?></h6>
                    <p class="small"><?= $_SESSION['slug'] ?></p>
                </div>
            </div>
            <div class="item">
                <ul class="padding-small">
                    <?php 
                        foreach($data['usersPart'] as $friend){
                            foreach($data['friends'] as $isFriend){
                                if($friend['id'] == $isFriend['user_to']){
                    ?>
                    <li class="margin-bottom-small border-bottom-default">
                        <a href="<?= BASE ?>/talk/<?= $friend['id'] ?>" class="items-flex">
                            <figure class="img-little-small-user margin-right-small w20">
                                <img src="<?= BASE_STORAGE ?>users/<?= $friend['image'] ?>" />
                            </figure>
                            <div class="w80">
                                <h6 class="margin-bottom-tiny"><?= $friend['name'] ?></h6>
                                <p class="small"><?= $friend['slug'] ?></p>
                            </div>
                        </a>
                    </li>
                    <?php }}} ?>
                </ul>
                <a href="<?= BASE ?>/new-group" class="button-item items-flex just-space-between align-center">
                    <p class="small">New Group</p>
                    <span class="button bg-purple"><i class="ri-add-line"></i></span>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="row margin-bottom-default">
                <div class="items-flex align-center just-space-between margin-bottom-small">
                    <h3>Messages</h3>
                    <i class="ri-edit-box-line"></i>
                </div>
                <form method="post" action="/users" class="search items-flex align-center pos-relative">
                    <button name="search"><i class="ri-search-fill"></i></button>
                    <input type="text" name="name" placeholder="Search" class="w100" autocomplete="off" />
                </form>
            </div>
            <div class="row">
                <div class="col margin-bottom-small">
                    <p>Users</p>
                </div>
                <ul class="margin-bottom-small">
                    <?php 
                        foreach($data['users'] as $friend){
                            foreach($data['friends'] as $isFriend){
                                if($friend['id'] == $isFriend['user_to']){
                    ?>
                    <li class="message border-bottom-default">
                        <a href="<?= BASE ?>/talk/<?= $friend['id'] ?>" class="items-flex">
                            <figure class="img-small-user w30">
                                <img src="<?= BASE_STORAGE ?>users/<?= $friend['image'] ?>"  class="pos-relative" />
                            </figure>
                            <div class="items-flex align-center w70">
                                <div class="w80">
                                    <h6><?= $friend['name'] ?></h6>
                                    <p class="tiny limit-line-clamp-one"><?= $friend['description'] ?></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php }}} ?>
                </ul>
                <div class="col margin-bottom-small margin-top-small">
                    <p>Groups</p>
                </div>
                <ul>
                <?php 
                        foreach($data['myGroups'] as $key => $group){
                    ?>
                    <li class="message border-bottom-default">
                        <a href="<?= BASE ?>/group/<?= $group['id'] ?>" class="items-flex">
                            <figure class="img-small-user w30">
                                <img src="<?= BASE_STORAGE ?>groups/<?= $group['image'] ?>"  class="pos-relative" />
                            </figure>
                            <div class="items-flex align-center w70">
                                <div class="w80">
                                    <h6><?= $group['name'] ?></h6>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</aside>



