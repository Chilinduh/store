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

<style>

  .block-banners-images .container:before,
  .block-banners-images .container:after {
    content: unset !important;
  }

  .block-banners-images .container {
    display: flex;
    flex-direction: row;
    gap: 20px;
    flex-wrap: wrap;
  }

  .block-banners-images__item {

  }

  .block-banners-images__item img {
    width: auto; /* Изображение внутри растягивается */
    height: 150px; /* Пропорции сохраняются */
    display: block;
    border-radius: 10px;
  }
</style>
