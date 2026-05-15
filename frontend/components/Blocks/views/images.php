<div class="block-space block-space--layout--divider-xs"></div>
<div class="block block-banners-images">
  <div class="container ">
    <?php foreach ($model as $item) { ?>
      <a class="block-banners-images__item" href="<?= $item->link ?? '#' ?>">
        <img src="<?= $item->files->original ?? '' ?>">
      </a>
    <?php } ?>

  </div>
</div>
<div class="block-space block-space--layout--divider-nl"></div>
