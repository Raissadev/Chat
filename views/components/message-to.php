<li class="message user-message message-to items-flex margin-bottom-default">
    <div class="col margin-right-small">
        <figure class="img-small-user">
            <img src="<?= BASE_STORAGE ?>users/<?= $data['user']['image'] ?>" />
        </figure>
    </div>
    <div class="col w95">
        <div class="items-flex align-center margin-bottom-small">
            <h6 class="margin-right-small"><?= $data['user']['name'] ?></h6>
            <p class="tiny"><?= substr($talk['date'], 11, 8); ?></p>
        </div>
        <div class="box">
            <p><?= $talk['message']; ?></p>
        </div>
    </div>
</li>