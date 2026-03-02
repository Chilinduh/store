<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 22.11.11
 * Time: 15:00
 */

use app\components\BreadcrumbWidget;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yiister\gentelella\widgets\Panel;
use yii\helpers\ArrayHelper;
use app\components\PanelWidget;
use kartik\form\ActiveForm;
use kartik\checkbox\CheckboxX;
use backend\models\Menu;
use common\models\AttributesGroups;
use common\models\Attributes;
use kartik\select2\Select2;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);

?>

<?= BreadcrumbWidget::widget([
  'title' => 'Группы атрибутов',
  'createUrl' => '/attributes-groups/create',
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $model->name ?? '']
  ]
]);
?>

<?= PanelWidget::start(); ?>
<div class="row ">
  <div class="col-md-12">
    <?php

    $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name'); ?>

    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>
  </div>
</div>
<?php PanelWidget::finish() ?>

<?php if (!$model->isNewRecord) { ?>

  <?= PanelWidget::start(true, [ 'heading' => 'Добавить атрибуты в группу' ]); ?>
  <div class="row ">
    <div class="col-md-12">
      <?php

      $form = ActiveForm::begin(['action' => $model->id.'/product-attributes']); ?>

      <?= $form->field($productAttributesModel, 'attribute_group_id')->hiddenInput(['value'=> $model->id])->label(false); ?>
      <?= $form->field($productAttributesModel, 'attribute_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Attributes::find()->asArray()->all(), 'id', 'name'),
      ]); ?>

      <?= Html::submitButton('Добавить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

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
            'attribute' => 'attribute_id',
            'filter' => false,
            'format' => 'html',
            'value' => static function($model) {

              $attribute = $model->getAttribute($model->attribute_id);
              
              return $attribute ?? '';
            }
          ],
          [
            'class' => 'yii\grid\ActionColumn',
            'headerOptions' => ['width' => '120'],
            'contentOptions' => ['class' => 'actions'],
            'template' => '{update}  {delete}',
            'buttons' => [
              'update' => function ($url, $model) {

                return '<a href="/attributes/' . $model->id . '" class="menu-link px-3" target="_blank">
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
              'delete' => function ($url, $productAttributesModel) use ($model) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                  ['/attributes-groups/' . $model->id . '/attributes/' . $productAttributesModel->id . '/delete'],
              );

              },
            ],
          ],

        ],
      ]); ?>

    </div>
  </div>
  <?php PanelWidget::finish() ?>
<?php } ?>


