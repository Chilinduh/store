<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 16.10.19
 * Time: 18:37
 */

use app\components\TableDataWidget;
use common\models\Stocks;

use backend\assets\TableAsset;
use backend\assets\FormsAsset;

?>

<?= TableDataWidget::widget([
    'order' => ['id'=>SORT_ASC],
    'pagination' => false,
    'model' => $model,
    'filter' => $filter,
//    'columns' => $columns,
//    'labels' => $labels,
    'data' => $data,
    'title' => 'Каталог товаров',
    'labels' => [
        'name',
        'category_id',
        'group_id',
        'stock_id',
        'city',
        'manufacturer_id',
        'packaging_type_id',
        'weight',
        'color_id',
        'color',
        'code',
        'main',
        'show',
//        'created_at',
//        'updated_at',
        '<i class="icon wb-edit"></i>',  '<i class="icon wb-close"></i>'
    ],
    'columns' => [
        'name',
        'category_id' => function($model) {

                return $model->getCategory()->name;
            },
        'group_id' => function($model) {

                if($group_id = $model->hasGroup()->group_id) {

                    $url = Yii::$app->getUrlManager()->createUrl(['weight-groups/'.$group_id.'/products']); //$model->id для AR

                    return \yii\helpers\Html::a('<i class="icon wb-list" aria-hidden="true"></i>', $url,
                        ['class' => 'btn btn-sm btn-icon btn-flat btn-success update',
                            'title' => Yii::t('yii', 'Список товаров'),
                            'data-pjax' => '0']);
                }

            },
        'stock_id' => function($model) {

                return $model->getStock()->name;
//                return Yii::$app->session->get('settings')->city()->name;
            },
        'city' => function($model) {
                return Stocks::getCity($model->stock_id)->name;
//            return Yii::$app->session->get('settings')->city()->name;
            },
        'manufacturer_id' => function($model) {
                return $model->getPackagingType()->name;
            },
        'packaging_type_id' => function($model) {
                return $model->getManufacturer()->name;
            },
        'weight' => function($model) {
                return $model->weight;
            },
        'color_id' => function($model) {
                return $model->color()->name;
            },
        'color' => function($model) {
                return '<div class="float-left color-box" style="background-color:'.$model->color()->color.'"></div>';
            },
        'code',
        'main' => function($model) {
                return \yii\helpers\Html::tag('i ', '', ['class' => 'icon wb-'.($model->main ? 'check color-success' : 'close color-danger opacity-50')]);
            },
        'show' => function($model) {
                return \yii\helpers\Html::tag('i ', '', ['class' => 'icon wb-'.($model->show ? 'check color-success' : 'close color-danger opacity-50')]);
            },
        'edit' => function ($model) {

                $url = Yii::$app->getUrlManager()->createUrl([Yii::$app->controller->id.'/'.$model->id]); //$model->id для AR
                return \yii\helpers\Html::a('<i class="icon wb-edit" aria-hidden="true"></i>', $url,
                    ['class' => 'btn btn-sm btn-icon btn-flat btn-default update',
                        'title' => Yii::t('yii', 'Редактировать'),
                        'data-pjax' => '0']);
            },

        'delete' => function ($model) {

                $url = Yii::$app->getUrlManager()->createUrl([Yii::$app->controller->id.'/delete','id'=>$model->id]); //$model->id для AR
                return \yii\helpers\Html::a( '<i class="icon wb-close" aria-hidden="true"></i>', $url,
                    [
                        'title' => Yii::t('yii', 'Удалить'),
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ]]);
            }
    ],

]) ?>





