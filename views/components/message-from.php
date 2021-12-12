<li class="message user-message message-from items-flex margin-bottom-default">
    <div class="col w95 text-right">
        <div class="items-flex align-center just-end margin-bottom-small">
            <p class="tiny"><?= substr($talk['date'], 11, 8); ?></p>
            <h6 class="margin-left-small">You</h6>
        </div>
        <div class="box">
            <p><?= $talk['message']; ?></p>
        </div>
    </div>
    <div class="col margin-left-small">
        <figure class="img-small-user">
            <img src="<?= BASE_STORAGE ?>users/<?= $_SESSION['image'] ?>" />
        </figure>
    </div>
</li>