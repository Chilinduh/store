<?php
use common\models\Products;

?>
<?= \kartik\grid\GridView::widget([
  'dataProvider' => $dataProvider,
  'filterModel' => $searchModel,
  'containerOptions' => [
    'style' => 'min-height:100px; overflow: auto; word-wrap: break-word;'
  ],
  'toolbar' => [
//        '{export}',
//        '{toggleData}'
  ],
//        'rowOptions' => function($model) {
//
//          if($model->deleted_at) {
//            return ['class' => 'danger']; // Генерирует опции для tr
//          }
//          return [];
//        },
  'pjax' => true,
  'toggleDataOptions' => ['minCount' => 10],
  'bordered' => true,
  'resizableColumns' => true,
  'striped' => false,
  'condensed' => false,
  'responsive' => true,
  'hover' => true,
  'floatHeader' => true,
  'floatHeaderOptions' => ['top' => true],
  'panel' => [
    'type' => 'primary'
  ],
  'columns' => [
    //['class' => 'yii\grid\SerialColumn'],
//    [
//      'hAlign' => 'center',
//      'vAlign' => 'middle',
//      'attribute' => 'id',
//      'filter' => false,
//    ],

    [
      'hAlign' => 'center',
      'vAlign' => 'middle',
      'attribute' => 'name',
      'format' => 'raw',
      'filter' => false,
      'value' => function ($model) {

        $manufacturer = $model->getManufacturer()->one();
        $brand = $model->getBrand()->one();
        $images = $model->getFiles()->asArray()->all();

        $emptyAttributesCount = 0;

        foreach ($model->attributesValues as $attribute) {
          $emptyAttributesCount += !empty($attribute->value) ? 1 : 0;
        }

        $classOptions = [
          0 => 'danger',
          1 => 'danger',
          2 => 'warning',
          3 => 'success',
          4 => 'primary',
        ];

        $class = $classOptions[count($images)]??"primary";
        $source = isset($model->productSources->source_url) && !empty($model->productSources->source_url) ? '<a href="'.$model->productSources->source_url.'" target="_blank">Источник</a>, ' : '<span class="text-danger">Источник</span>, ';
        $sourceRewrite = isset($model->productSources->rewrite_description) && !empty($model->productSources->rewrite_description) ? strlen($model->productSources->rewrite_description)  :  0 ;

        return '
          <div class="d-flex align-items-center">
            <a href="' . Yii::$app->params['imageUrl'] . ($images[0]['original']??'') . '" target="_blank" class="symbol symbol-50px">
              <span class="symbol-label" style="background-image:url(' . Yii::$app->params['imageUrl'] . (isset($images[0]) ? $images[0]['thumbnail'] : '') . ');"></span>
            </a><sup><span class="badge badge-light-'.$class.'">'.($images? count($images) : 0).'</span></sup>
            <div class="ms-5">
              <a href="/products/' . $model->id . '">
                  <div class="fw-bold fs-5 text-left">' . $model->name . '</div>
              </a>
              <div class="text-left">Арт: '.($model->code??'').', Произв.: '.($manufacturer->name??'').', Бренд: '.($brand->name??'').'</div>
              <div class="text-left">'.$source.' Описание: '.strlen($model->description).' / '.$sourceRewrite.' символов, </div>
              <div class="text-left">Количество аттрибутов: <span class="badge badge-light-'.($classOptions[$emptyAttributesCount]??'primary').'">'.$emptyAttributesCount.'</span> из '.count($model->attributesValues).'</div>
              <div class="text-left"><a href="'.(Yii::$app->params['imageUrl']).'catalog/'.$model->category_id.'/'.$model->id.'" target="_blank">На сайте</a></div>
            </div>
          </div>';

        return '';
      }
    ],
    [
      'hAlign' => 'left',
      'vAlign' => 'left',
      'label' => 'Сопутсвующие товары',
      'filter' => false,
      'format' => 'raw',
      'value' => static function ($model) {

        $productsRelated = Products::find()->leftJoin('products_related pr', 'pr.product_related_id = products.id')->andWhere(['pr.product_id' => $model->id])->asArray()->all();
        if(count($productsRelated)) {
          $productsRelated = \yii\helpers\ArrayHelper::map($productsRelated, 'id', 'name');
          return implode(',<br>', $productsRelated);
        }
        return  '';
      }
    ],
    [
      'hAlign' => 'center',
      'vAlign' => 'middle',
      'attribute' => 'availability_id',
      'filter' => false,
      'format' => 'raw',
      'value' => static function ($model) {

        if($availability = $model->getAvailability()) {
          return '<div style="color:'.$availability->color.'">'.$availability->name.'</div>';
        }
        return '';
      }
    ],
    [
      'hAlign' => 'center',
      'vAlign' => 'middle',
      'attribute' => 'category_id',
      'filter' => false,
      'value' => static function ($model) {

        $model = $model->getCategory()->one();
        if ($model) {

          return $model->name;
        }
        return '';
      }
    ],

    [
      'hAlign' => 'center',
      'vAlign' => 'middle',
      'attribute' => 'weight',
      'filter' => false,
      'value' => static function ($model) {

        return $model->weight ?? '';
      }
    ],
    [
      'hAlign' => 'center',
      'vAlign' => 'middle',
      'attribute' => 'color_id',
      'filter' => false,
      'value' => static function ($model) {

        return $model->color()->name ?? '';
      }
    ],
    [
      'hAlign' => 'center',
      'vAlign' => 'middle',
      'attribute' => 'show',
      'format' => 'raw',
      'value' => function($model) {

        return \yii\helpers\Html::tag('i', '', ['class' => 'fa fa-eye '.($model->show ? 'item-show' : '')]);
      }
    ],
    [
      'hAlign' => 'center',
      'vAlign' => 'middle',
      'attribute' => 'price',
    ],
    [
      'class' => 'yii\grid\ActionColumn',
      'headerOptions' => ['width' => '140'],

      'contentOptions' => ['class' => 'actions'],
      'template' => '{edit} {delete}',
      'buttons' => [
        'edit' => function ($url, $model) {

          return '<a href="/products/' . $model->id . '" class="menu-link px-3">
                      <span class="svg-icon svg-icon-primary svg-icon-2x">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#009ef7" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                <rect fill="#009ef7" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                            </g>
                        </svg>
                      </span>
                    </a>';

        },
        'delete' => function ($url, $model) {

          return '<a href="/products/' . $model->id . '/delete" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">
                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                       <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect x="0" y="0" width="24" height="24"/>
                              <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#009ef7" fill-rule="nonzero"/>
                              <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#009ef7" opacity="0.3"/>
                          </g>
                      </svg>
                    </span>
                  </a>';
        },
      ],
    ],
  ],
]); ?>
