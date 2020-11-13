<button onclick="window.history.back();" class="uk-button uk-button-default">Back</button>
<h1><?= $album->title ?></h1>
<br>
<div class="uk-flex uk-flex-wrap uk-flex-between">
    <?php foreach ($album->tracks as $track) { ?>
        <div class="uk-card uk-card-default uk-card-body uk-width-1-5@m ">
            <h3 class="uk-card-title"><?= $track->title ?></h3>
            <a href='?downloadTrackId=<?= $track->id ?>' class="uk-button uk-button-primary">Download</a><br>
        </div>
    <?php } ?>
</div>
