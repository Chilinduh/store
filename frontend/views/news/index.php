<?php

use common\models\NewsCategory;
use frontend\components\BreadCrumbsWidget;

?>

<div class="block-header block-header--has-breadcrumb block-header--has-title">
  <div class="container">
    <div class="block-header__body">
      <?= BreadCrumbsWidget::widget(['breadCrumbs' => $breadCrumbs]) ?>
      <h1 class="block-header__title">Новости</h1>
    </div>
  </div>
</div>
<div class="block blog-view blog-view--layout--list">
  <div class="container">
    <div class="blog-view__body">
      <div class="blog-view__item blog-view__item-sidebar">
        <?= $this->render(Yii::getAlias('_left-menu.php'), compact('categories')); ?>
      </div>
      <div class="blog-view__item blog-view__item-posts">
        <div class="block posts-view">
          <div class="posts-view__list posts-list posts-list--layout--list">
            <div class="posts-list__body">
              <?php foreach ($news as $item) {

                $category = NewsCategory::findOne($item->category_id);
                $file = $item->getFiles()->one();
              ?>

                <div class="posts-list__item">
                  <div class="post-card post-card--layout--list">
                    <div class="post-card__image">
                      <a href="/news/<?= $category->id ?>/<?= $item->id ?>">
                        <img src="<?= $file->thumbnail??'' ?>" alt="">
                      </a>
                    </div>
                    <div class="post-card__content">
                      <div class="post-card__category">
                        <a href="/news/<?= $category->id ?>"><?= $category->name ?></a>
                      </div>
                      <div class="post-card__title">
                        <h2><a href="/news/<?= $category->id ?>/<?= $item->id ?>"><?= $item->title ?></a></h2>
                      </div>
                      <div class="post-card__excerpt">
                        <div class="typography">
                          <?= $item->announce ?>
                        </div>
                      </div>
                      <div class="post-card__more">
                        <a href="/news/<?= $category->id ?>/<?= $item->id ?>" class="btn btn-secondary btn-sm">подробнее</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
          <?php if(0) { ?>
          <div class="posts-view__pagination">
            <ul class="pagination">
              <li class="page-item disabled">
                <a class="page-link page-link--with-arrow" href="" aria-label="Previous">
                                                <span class="page-link__arrow page-link__arrow--left"
                                                      aria-hidden="true"><svg width="7" height="11">
                                                        <path
                                                          d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
                                                    </svg>
                                                </span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active" aria-current="page">
                                            <span class="page-link">
                                                2
                                                <span class="sr-only">(current)</span>
                                            </span>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item page-item--dots">
                <div class="pagination__dots"></div>
              </li>
              <li class="page-item"><a class="page-link" href="#">9</a></li>
              <li class="page-item">
                <a class="page-link page-link--with-arrow" href="" aria-label="Next">
                                                <span class="page-link__arrow page-link__arrow--right"
                                                      aria-hidden="true"><svg width="7" height="11">
                                                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                                                    </svg>
                                                </span>
                </a>
              </li>
            </ul>
          </div>
          <?php }  ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>
