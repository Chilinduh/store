<?php

use app\components\TableDataWidget;
use app\components\ModalWidget;
use app\components\PanelWidget;

?>

<?php
PanelWidget::begin([
  'title' =>  'Update',
  'heading' => false,
  'id' => $model->formName()

]);
?>

<?= TableDataWidget::widget([
    'order' => ['id'=>SORT_ASC],
    'pagination' => true,
    'model' => $model,
    'filter' => $filter,
    'columns' => $columns,
    'labels' => $labels,
    'data' => $data,
    'title' => 'Каталог товаров',
    'labels' => [
        'id',
        'name',
        '<i class="icon wb-list"></i>', '<i class="icon wb-close"></i>'
    ],
    'columns' => [
        'id',
        'name' => function($model) {

            $product = $model->getColorProducts(['main' => 1])->one();
            return $product ? $product->name : $model->id;
        },
        'groups' => function ($model) {

                $url = Yii::$app->getUrlManager()->createUrl([Yii::$app->controller->id.'/'.$model->id.'/products']); //$model->id для AR

                return \yii\helpers\Html::a('<i class="icon wb-list" aria-hidden="true"></i>', $url,
                    ['class' => 'btn btn-sm btn-icon btn-flat btn-default update',
                        'title' => Yii::t('yii', 'Список товаров'),
                        'data-pjax' => '0']);
        },
        'delete' => function ($model) {

                $url = Yii::$app->getUrlManager()->createUrl([Yii::$app->controller->id.'/delete','id'=>$model->id]); //$model->id для AR

                return \yii\helpers\Html::a( '<i class="icon wb-close" aria-hidden="true"></i>', $url,
                    [
                        'title' => Yii::t('yii', 'Удалить'), 'class' => 'btn btn-sm btn-icon btn-flat btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]);
            }
    ],

]) ?>

<?php PanelWidget::end();?>


