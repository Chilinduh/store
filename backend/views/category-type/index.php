<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use app\components\TableDataWidget;
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
    'title' => 'Типы категорий',
    'labels' => [
        'id', 'name', 'show', '<i class="icon wb-edit"></i>', '<i class="icon wb-close"></i>'
    ],
    'columns' => [
        'id',
        'name',
        'show' => function($model) {
                return \yii\helpers\Html::tag('i ', '', ['class' => 'icon wb-'.($model->show ? 'check color-success' : 'close color-danger opacity-50')]);
            },
        'edit' => function ($model) {

                $url = Yii::$app->getUrlManager()->createUrl([Yii::$app->controller->id.'/update/'.$model->id]); //$model->id для AR

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

<?php PanelWidget::end();?>
