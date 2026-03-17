<?php

use app\components\PanelWidget;

?>

<?= $this->render('_carousel_banner_form', ['model' => $model, 'bannersCarousel' => new common\models\BlocksBannersCarousel()]); ?>




<?php
if($bannersCarousel = \common\models\BlocksBannersCarousel::find()->where(['block_id' => $model->id])->all()) {

  foreach ($bannersCarousel as $item) {
?>
<?= PanelWidget::start(); ?>
<div class="banners_carousel">
  <div class="banners_carousel--info">
    Загововок: <?= $item->title ?> <br>
    Анонс: <?= $item->announce ?> <br>
    Позиция в карусели: <?= $item->sequence ?> <br>
    <div class="banners_carousel--info--image">
      <?php
      if($item->files->original??false) {
        echo '<img src="'.(Yii::$app->params['imageUrl'].$item->files->original).'">';
      }
      ?>
    </div>
  </div>
  <div >
    <a href="/blocks/<?= $item->id ?>/banners-carousel-delete" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">
      <span class="svg-icon svg-icon-primary svg-icon-2x">
         <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#009ef7" fill-rule="nonzero"/>
                <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#009ef7" opacity="0.3"/>
            </g>
        </svg>
      </span>
    </a>
  </div>
</div>
<?php PanelWidget::finish() ?>
<?php } ?>
<?php } ?>

  <style>
    .banners_carousel .banners_carousel--info--image {

      max-width: 1200px;
      
    }
    .banners_carousel img {
      max-width: 1024px;
      width: fit-content;
    }
    .banners_carousel {
      display: flex;
      flex-direction: row;
      align-items: flex-start;
      justify-content: space-between;
      padding: 20px;
    }
  </style>





