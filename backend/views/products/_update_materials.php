<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use app\components\PanelWidget;
use yii\helpers\Html;
use backend\models\Menu;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use app\components\BreadcrumbWidget;
use yii\widgets\Breadcrumbs;
use kartik\file\FileInput;
use kartik\checkbox\CheckboxX;
use common\models\Units;
use yii\helpers\ArrayHelper;
use common\models\Materials;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
//$parent = Menu::findOne(['id' => $menu->parent_id]);
?>
s
<?= BreadcrumbWidget::widget([
  'title' => 'Товары',
  'createUrl' => '/products/create',
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $model->name]
  ]
]);
?>

<?= PanelWidget::start(false); ?>

<div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10">

  <?php require_once('_tabs.php'); ?>

</div>
<div class="card card-flush">
  <!--begin::Card header-->
  <div class="card-body pb-0">

    <?php $form = ActiveForm::begin(); ?>

    <?php

    echo $form->field($productMaterials, 'product_id')->hiddenInput()->label(false);

    echo $form->field($productMaterials, 'material_id')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(Materials::find()->all(), 'id', 'name'),
      'options' => ['placeholder' => 'Выбрать материал'],
    ]);

    echo $form->field($productMaterials, 'unit_id')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(Units::find()->all(), 'id', 'name'),
      'options' => ['placeholder' => 'Выбрать ед. измерения'],
    ]);

    echo $form->field($productMaterials, 'value');

    ?>

    <div class="form-group">
      <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


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
        [
          'hAlign' => 'center',
          'vAlign' => 'left',
          'attribute' => 'material_id',
          'filter' => false,
          'format' => 'html',
          'value' => function ($model) {

            $material = Materials::findOne(['id' => $model->material_id]);
            return $material->name;
          },
        ],
        [

          'hAlign' => 'center',
          'vAlign' => 'middle',
          'filter' => false,
          'attribute' => 'value',
        ],
        [
          'class' => 'yii\grid\ActionColumn',
          'headerOptions' => ['width' => '60'],
          'contentOptions' => ['class' => 'actions'],
          'template' => '{delete}',
          'buttons' => [
            'delete' => function ($url, $material) use ($model) {
              return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                ['/products/' . $model->id . '/materials/'.$material->id.'/delete'],
              );

            },
          ],
        ],

      ],
    ]); ?>

  </div>

</div>

<?= PanelWidget::finish(false); ?>
