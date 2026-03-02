<?php 

use app\components\TableDataWidget;
use app\components\ModalWidget;

?>

<?= TableDataWidget::widget([
    'order' => ['id'=>SORT_ASC],
    'pagination' => true,
    'perPage' => 10,
    'model' => $model,
    'filter' => $filter,
    'columns' => $columns,
    'labels' => $labels,
    'data' => $data,
    'title' => 'Категории товаров',
    'labels' => [
        'id',         
        'name',
        'city_id',
        'product_id',
        'quantity',
        'weight',
        'code',
        'description',
        'show',
//        'created_at',
//        'updated_at', 
        '<i class="icon wb-edit"></i>', '<i class="icon wb-list"></i>', '<i class="icon wb-close"></i>'
    ],
    'columns' => [
        'id',         
        'name',
        'city_id' => function($model) {
                return $model->getCity()->name;
            },
        'product_id' => function($model) {
            return $model->getProduct()->name;
        },
        'quantity',
        'weight',
        'code',
        'description',
        'show' => function($model) {
                return \yii\helpers\Html::tag('i ', '', ['class' => 'icon wb-'.($model->show ? 'check color-success' : 'close color-danger opacity-50')]);
            },
//        'created_at',        
//        'updated_at',
        'edit' => function ($model) {

                $url = Yii::$app->getUrlManager()->createUrl([Yii::$app->controller->id.'/'.$model->product_id.'/items/'.$model->id]); //$model->id для AR

                return \yii\helpers\Html::a('<i class="icon wb-edit" aria-hidden="true"></i>', $url,
                    ['class' => 'btn btn-sm btn-icon btn-flat btn-default update',
                        'title' => Yii::t('yii', 'Редактировать'),
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


