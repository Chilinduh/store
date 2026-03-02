<nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
  <ol class="breadcrumb__list">
    <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
    <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first">
      <a href="/" class="breadcrumb__item-link">Главная</a>
    </li>
    <?php

    foreach ($breadCrumbs as $item) { ?>
      <li class="breadcrumb__item breadcrumb__item--parent">
          <a href="<?= $item['url'] ?>" class="breadcrumb__item-link"><?= $item['name'] ?></a>
      </li>
    <?php } ?>
    <?php if (0) { ?>
      <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
        <span class="breadcrumb__item-link">Текущая страница</span>
      </li>
    <?php } ?>
    <li class="breadcrumb__title-safe-area" role="presentation"></li>
  </ol>
</nav>
