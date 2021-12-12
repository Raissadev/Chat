<section class="content">

<header class="margin-bottom-default">
    <div class="wrap items-flex align-center just-space-between w95 center">
        <div class="col w30">
            <h4 class="hide-device-small">Advanced Chat</h4>
            <a class="toggle hide-device-bigger"><i class="ri-menu-line"></i></a>
        </div>
        <form class="col form-header items-flex just-center w30">
            <button class="style-none margin-right-small"><i class="ri-vidicon-fill"></i></button>
            <button class="style-none margin-right-small"><i class="ri-phone-fill"></i></button>
            <input type="file" name="image" id="image" style="display:none" />
            <label for="image" class="style-none margin-right-small"><i class="ri-image-fill"></i></label>
            <button class="style-none"><i class="ri-file-reduce-fill"></i></button>
        </form>
        <div class="users col w30 text-right items-flex align-center just-end">
        <?php 
            foreach($data['users'] as $user){
                if($user['id'] == $_SESSION['id'] || $user['id'] == $data['data']){
        ?>
            <figure class="img-little-small-user">
                <img src="<?= BASE_STORAGE ?>users/<?= $user['image'] ?>"  class="pos-relative" />
            </figure>
        <?php }} ?>
        </div>
    </div>
</header>
