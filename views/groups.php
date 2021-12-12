<section class="container-users w100 items-flex just-center">
    <div class="wrap w95">
        <form method="post" action="/groups" class="margin-bottom-default items-flex just-space-between align-center">
            <a class="toggle hide-device-bigger margin-right-small"><i class="ri-menu-line"></i></a>
            <input type="text" name="name" placeholder="Search..." class="w80" autocomplete="off" />
            <button type="submit" name="search" class="btn-input w10 margin-left-small">Search</button>
        </form>
        <ul class="items-flex flex-wrap">
            <?php 
                foreach($data['groups'] as $key => $group){
            ?>
            <li class="box w22 margin-right-small margin-bottom-default">
                <figure class="img-default-user text-center">
                    <img src="<?= BASE ?>/storage/groups/<?= $group['image'] ?>" />
                </figure>
                <div class="row margin-top-small text-center">
                    <div class="">
                        <h5><?= $group['name']; ?></h5>
                    </div>
                    <form method="post" action="/participate-group" class="buttons margin-top-small items-flex just-center">
                        <input type="hidden" name="users" value="<?= $group['users'] ?>" />
                        <input type="hidden" name="user" value="<?= $_SESSION['id'] ?>" />
                        <input type="hidden" name="group" value="<?= $group['id']; ?>" />
                        <button type="submit" name="participate" class="bg-black-very-weak w60 margin-right-small">Participate</button>
                        <a href="<?= BASE ?>/group/<?= $group['id'] ?>" class="button bg-black-very-weak "><i class="ri-message-3-fill"></i></a>
                    </form>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
</section>