
<div class="block-banners block">
  <div class="container">
    <div class="block-banners__list">
      <?php if($left) { ?>
      <a href="<?= $left->banners->link ?>" class="block-banners__item <?= empty($left->banners->title) ? 'background' : '' ?> block-banners__item--style--one">
        <span class="block-banners__item-image"><img src="<?= $left->files->original??''?>" alt=""></span>
        <span class="block-banners__item-image block-banners__item-image--blur"><img src="<?= $left->files->original??''?>" alt=""></span>
        <?php if(!empty($left->banners->title)) { ?>
        <span class="block-banners__item-title" ><?= $left->banners->title ?></span>
        <span class="block-banners__item-details">
            <?= $left->banners->announce ?>
        </span>
        <span class="block-banners__item-button btn btn-primary btn-sm">
            Подробнее
        </span>
        <?php } ?>
      </a>
      <?php } ?>
      <?php if($right) { ?>
      <a href="<?= $right->banners->link ?>" class="block-banners__item <?= empty($right->banners->title) ? 'background' : '' ?> block-banners__item--style--two">
        <span class="block-banners__item-image"><img src="<?= $right->files->original??''?>" alt=""></span>
        <span class="block-banners__item-image block-banners__item-image--blur"><img src="<?= $right->files->original??''?>" alt=""></span>
        <?php if(!empty($right->banners->title)) { ?>
        <span class="block-banners__item-title" ><?= $right->banners->title ?></span>
        <span class="block-banners__item-details">
          <?= $right->banners->announce ?>
        </span>
        <span class="block-banners__item-button btn btn-primary btn-sm">
            Подробнее
        </span>
        <?php } ?>
      </a>
      <?php } ?>
    </div>
  </div>
</div>
