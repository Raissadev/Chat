<?php 
    $isMessage = explode('/',$_SERVER['PATH_INFO']);
    if($isMessage[2] === $data['data']){
?>
<section class="container-messages">
    
    <div class="content-messages">
        <ul class="messages list-messages" id="messages">
            <li class="message user-message message-to items-flex margin-bottom-default">
                <div class="col margin-right-small">
                    <figure class="img-small-user">
                        <img src="<?= BASE_STORAGE ?>users/<?= $data['user']['image'] ?>" />
                    </figure>
                </div>
                <div class="col w95">
                    <div class="items-flex align-center margin-bottom-small">
                        <h6 class="margin-right-small"><?= $data['user']['name'] ?></h6>
                        <p class="tiny"><?= date('H:i:s'); ?></p>
                    </div>
                    <div class="box">
                        <p>Welcome to the platform!</p>
                    </div>
                </div>
            </li>
            <li class="message user-message message-from items-flex margin-bottom-default">
                <div class="col w95 text-right">
                    <div class="items-flex align-center just-end margin-bottom-small">
                        <p class="tiny"><?= date('H:i:s') ?></p>
                        <h6 class="margin-left-small">You</h6>
                    </div>
                    <div class="box">
                        <p><?= $_SESSION['name']; ?> has logged in</p>
                    </div>
                </div>
                <div class="col margin-left-small">
                    <figure class="img-small-user">
                        <img src="<?= BASE_STORAGE ?>users/<?= $_SESSION['image'] ?>" />
                    </figure>
                </div>
            </li>
            <?php 
                foreach($data['talk'] as $key => $talk){
                    if($talk['user_from'] !== $_SESSION['id']){
                        include 'components/message-to.php'; 
                    }else{
                        include 'components/message-from.php'; 
                    }
                }
            ?>
        </ul>
    </div>
<?php } ?>
    <div class="container-send-message pos-relative items-flex just-center">
        <form method="GET" action="/new-message" id="form-messages" class="send-message w95 items-flex align-center just-space-between">
            <div class="w70 items-flex align-center">
                <figure class="img-little-small-user margin-right-small">
                    <img src="<?= BASE_STORAGE ?>users/<?= $_SESSION['image'] ?>" />
                </figure>
                <input type="text" name="message" id="message" placeholder="Your message" class="style-none w100" autocomplete="off" />
            </div>
            <div class="buttons items-flex align-center just-end w30">
                <a class="margin-right-small"><i class="ri-mic-fill"></i></a>
                <a class="margin-right-small"><i class="ri-links-line"></i></a>
                <input type="hidden" name="user_to" value="<?= $data['data'] ?>" />
                <button type="submit" name="send" id="send" class="w20"><i class="ri-send-plane-fill"></i></button>
            </div>
        </form>
    </div>

    <?php include './js/send-message.php'; ?>

</section>
