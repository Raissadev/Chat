<?php require 'components/flash-message.php'; ?>

<section class="container-welcome items-flex align-center just-center">
    <div class="wrap w75 items-flex just-center box">
        <div class="col w50">
            <h1 class="font-size-bigger">Welcome <?= $_SESSION['name'] ?>!</h1>
            <div class="row margin-top-default">
                <div class="margin-bottom-small">
                    <h4 class="margin-bottom-tiny">Description</h4>
                    <p><?= $_SESSION['description'] ?></p>
                </div>
                <div class="margin-bottom-small">
                    <h4 class="margin-bottom-tiny">Slug</h4>
                    <p><?= $_SESSION['slug'] ?></p>
                </div>
            </div>
        </div>
        <div class="col w50">
            <figure class="img-bigger-welcome">
                <img src="<?= BASE ?>/storage/users/<?= $_SESSION['image'] ?>" />
            </figure>
        </div>
    </div>
</section>