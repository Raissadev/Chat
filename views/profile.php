<section class="container container-profile w100 h100 items-flex align-center just-center flex-wrap">
    <a class="toggle hide-device-bigger margin-bottom-small-device-small w90 center"><i class="ri-menu-line"></i></a>
    <form method="post" action="/update-account" enctype="multipart/form-data" class="wrap w80 box items-flex w90-device-small flex-wrap-device-small">
        <div class="col w50 w100-device-small margin-bottom-default-device-small">
            <div class="margin-bottom-small">
                <h4 class="margin-bottom-small">Infos</h4>
                <input type="text" name="name" value="<?= $data['user']['name']; ?>" placeholder="Your name" class="w100 margin-bottom-tiny" />
                <input type="text" name="slug" value="<?= $data['user']['slug']; ?>" placeholder="Your slug" class="w100" />
                <input type="password" name="password" value="<?= $data['user']['password']; ?>" placeholder="Your password" class="w100" />
            </div>
            <div>
                <input type="text" name="description" value="<?= $data['user']['description']; ?>" placeholder="Your description" class="w100 margin-bottom-tiny" />
                <input type="file" name="image" value="<?= $data['user']['image']; ?>" class="w100 margin-bottom-small" />
                <button type="submit" name="update" class="w30 btn-input bg-purple center">Update Account!</button>
            </div>
        </div>
        <div class="col w50 margin-left-small w100-device-small">
            <figure class="img-bigger-user text-center">
                <img src="<?= BASE ?>/storage/users/<?= $data['user']['image'] ?>" />
            </figure>
        </div>
    </form>
</section>