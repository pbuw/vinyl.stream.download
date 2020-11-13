<div class="uk-text-center uk-margin-top">
    <a href='?pageId=<?= intval($pageId) - 1 ?>' class="uk-button uk-button-default">Back</a>
    <a href='?pageId=<?= intval($pageId) + 1 ?>' class="uk-button uk-button-default">Next</a>
</div>

<div class="uk-flex uk-flex-wrap uk-flex-between">
    <?php foreach ($artists->data as $artist) { ?>
        <div class="uk-card uk-card-default uk-card-body uk-width-1-5@m ">
            <h3 class="uk-card-title"><?= $artist->name ?></h3>
            <a href='?artistId=<?= $artist->id ?>' class="uk-button uk-button-primary">See</a><br>
        </div>
    <?php } ?>
</div>
