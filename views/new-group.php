<?php require 'components/flash-message.php'; ?>

<section class="container-profile w100 h100 items-flex align-center just-center">
    <form method="post" action="/new-group" enctype="multipart/form-data" class="wrap w80 box items-flex">
        <div class="col w50">
            <h2 class="margin-bottom-small">Create you Group</h2>
            <input type="text" name="name" placeholder="Name for Group" class="bg-black-very-weak w100 margin-bottom-small" autocomplete="off" />
            <button name="create" class="w30 bg-black-very-weak center margin-top-default">Create Group</button>
        </div>
        <div class="col w50 margin-left-small">
            <label for="image" class="content-image center">
                <i class="ri-landscape-fill"></i>
                <input type="file" name="image" id="image" style="display:none" />
            </label>
        </div>
    </form>
</section>