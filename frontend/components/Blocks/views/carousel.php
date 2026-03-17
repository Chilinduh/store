<div class="block-space block-space--layout--divider-xs"></div>
<div class="block block-slideshow">
  <div class="container">
    <div class="block-slideshow__carousel">
      <div class="owl-carousel">
        <?php foreach ($model as $item) { ?>
          <a class="block-slideshow__item" href="<?= $model->link??'#' ?>">
            <span class="block-slideshow__item-image block-slideshow__item-image--desktop" style="background-image: url('<?= $item->files->original ??''?>')"></span>
            <span class="block-slideshow__item-image block-slideshow__item-image--mobile" style="background-image: url('<?= $item->files->original??''?>')"></span>
            <span class="block-slideshow__item-offer"></span>
            <span class="block-slideshow__item-title"><?= $model->title ?></span>
            <span class="block-slideshow__item-details"><?= $model->announce ?></span>
          </a>
        <?php } ?>

      </div>
    </div>
  </div>
</div>
<div class="block-space block-space--layout--divider-nl"></div>
