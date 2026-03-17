<div class="block-space block-space--layout--divider-xs"></div>
<div class="block block-slideshow">
  <div class="container">
    <div class="block-slideshow__carousel">
      <div class="owl-carousel">
        <?php foreach ($model as $item) { ?>
          <a class="block-slideshow__item" href="<?= $item->link??'#' ?>">
            <span class="block-slideshow__item-image block-slideshow__item-image--desktop" style="background-image: url('<?= $item->files->original??''?>')"></span>
            <span class="block-slideshow__item-image block-slideshow__item-image--mobile" style="background-image: url('<?= $item->files->original??''?>')"></span>
            <?php if(!empty($item->title)) { ?>
            <span class="block-slideshow__item-title" style="color:<?= $item->title_color ?>"><?= $item->title ?></span>
            <span class="block-slideshow__item-details" style="color:<?= $item->announce_color ?>"><?= $item->announce ?></span>
            <?php } ?>
          </a>
        <?php } ?>

      </div>
    </div>
  </div>
</div>
<div class="block-space block-space--layout--divider-nl"></div>
