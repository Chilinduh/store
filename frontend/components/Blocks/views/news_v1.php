<?php

use common\models\NewsCategory;

?>

<div class="block-space block-space--layout--divider-nl"></div>
<div class="block block-posts-carousel block-posts-carousel--layout--list" data-layout="list">
  <div class="container">
    <div class="section-header">
      <div class="section-header__body">
        <h2 class="section-header__title">Новости</h2>
        <div class="section-header__spring"></div>
        <?php if($displayCategory??true) { ?>
        <ul class="section-header__links">
          <li class="section-header__links-item">
            <a href="" class="section-header__links-link">Специальные предложения</a>
          </li>
          <li class="section-header__links-item">
            <a href="" class="section-header__links-link">Новинки</a>
          </li>
          <li class="section-header__links-item">
            <a href="" class="section-header__links-link">Обзоры</a>
          </li>
        </ul>
        <?php } ?>
        <div class="section-header__arrows">
          <div class="arrow section-header__arrow section-header__arrow--prev arrow--prev">
            <button class="arrow__button" type="button">
              <svg width="7" height="11">
                <path
                  d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
              </svg>
            </button>
          </div>
          <div class="arrow section-header__arrow section-header__arrow--next arrow--next">
            <button class="arrow__button" type="button">
              <svg width="7" height="11">
                <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
              </svg>
            </button>
          </div>
        </div>
        <div class="section-header__divider"></div>
      </div>
    </div>
    <div class="block-posts-carousel__carousel">
      <div class="owl-carousel">
        <?php foreach ($data as $item) { ?>

          <div class="block-posts-carousel__item">
            <div class="post-card">
              <?php if($item->files->original??false) { ?>
                <div class="post-card__image">
                  <a href="/news/<?= $item->category->id ?>/<?= $item->id ?>">
                    <img src="<?= $item->files->original ?>" alt="">
                  </a>
                </div>
              <?php } ?>
              <div class="post-card__content">
                <div class="post-card__category">
                  <a href="/news/<?= $item->category->id ?>"><?= $item->category->name ?></a>
                </div>
                <div class="post-card__title">
                  <h2><a href="/news/<?= $item->category->id ?>/<?= $item->id ?>"><?= $item->title ?></a></h2>
                </div>
                <?php if(0) { ?>
                <div class="post-card__date">
                  <a href="#">Администратор</a> 5 сентября, 2020
                </div>
                <?php } ?>
                <div class="post-card__excerpt">
                  <div class="typography">
                    <?= $item->announce ?>
                  </div>
                </div>
                <div class="post-card__more">
                  <a href="/news/<?= $item->category->id ?>/<?= $item->id ?>" class="btn btn-secondary btn-sm">Подробнее</a>
                </div>
              </div>
            </div>
          </div>

        <?php } ?>
      </div>
    </div>
  </div>
</div>
