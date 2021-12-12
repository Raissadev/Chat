</section>

<aside class="panel-chat-info w15 w50-device-small hide-device-small">
    <div class="row items-flex align-center margin-bottom-default">
        <i class="ri-message-3-fill margin-right-tiny"></i><h4>Chat Details</h4>
    </div>
    <div class="row margin-bottom-default">
        <div class="text-center margin-bottom-small">
            <figure class="img-bigger margin-bottom-small">
                <img src="<?= BASE_STORAGE ?>users/<?= isset($data['group']) ? $data['group']['image'] : $data['user']['image'] ?>" />
            </figure>
            <h3 class="margin-bottom-tiny"><?= isset($data['group']) ? $data['group']['name'] : $data['user']['name'] ?></h3>
            <p><?= isset($data['group']) ? '@'.$data['group']['name'] : $data['user']['email'] ?></p>
        </div>
        <ul class="items-flex align-center just-space-between">
            <li class="w48 text-center">
                <div>
                    <p>Files</p>
                </div>
                <div class="items-flex align-center margin-top-tiny">
                    <i class="ri-folder-fill margin-right-tiny"></i>
                    <h2>0</h2>
                </div>
            </li>
            <li class="w48 text-center">
                <div>
                    <p>Links</p>
                </div>
                <div class="items-flex align-center margin-top-tiny">
                    <i class="ri-links-line margin-right-tiny"></i>
                    <h2><?= $data['countLinks'] ?></h2>
                </div>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="items-flex align-center margin-bottom-small">
            <i class="ri-group-fill margin-right-tiny"></i>
            <p>User</p>
        </div>
        <ul>
            <?php
                foreach($data['users'] as $user){
                    if($user['id'] == $data['user']['id'] || $user['id'] == $_SESSION['id']){
            ?>
            <li class="items-flex align-center margin-bottom-small">
                <div class="items-flex w70 align-center">
                    <figure class="img-little-small-user margin-right-tiny">    
                        <img src="<?= BASE_STORAGE ?>users/<?= $user['image'] ?>" />
                    </figure>
                    <h5><?= $user['name'] ?></h5>
                </div>
                <form method="POST" action="/accept-friend" class="items-flex w30 align-center">
                    <input type="hidden" name="user_to" value="<?= $user['id'] ?>" />
                    <button type="submit" name="accept-friend" class="style-none"><i class="ri-add-fill margin-right-tiny"></i></button>
                    <a href="<?= BASE ?>/talk/<?= $user['id'] ?>"><i class="ri-message-3-fill"></i></a>
                </form>
            </li>
            <?php }} ?>
        </ul>
    </div>
</aside>

</main>

