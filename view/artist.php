<button onclick="window.history.back();" class="uk-button uk-button-default">Back</button>
<h1><?= $artist->name ?></h1>
<br>
<div class="uk-flex uk-flex-wrap uk-flex-between">
    <?php foreach ($artist->albums as $album) { ?>
        <div class="uk-card uk-card-default uk-card-body uk-width-1-5@m ">
            <h3 class="uk-card-title"><?= $album->title ?></h3>
            <a href='?albumId=<?= $album->id ?>' class="uk-button uk-button-primary">See Album</a><br>
        </div>
    <?php } ?>
</div>
