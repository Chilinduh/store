<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use app\components\TableDataWidget;
use app\components\PanelWidget;
use app\components\GalleryWidget;
use app\components\CropWidget;
use yii\helpers\Html;
use app\components\FormWidget;
use app\components\ModalWidget;
use common\models\Manufacturers;
use common\models\Category;
use common\models\City;
use common\models\Products;

?>

<?php
PanelWidget::begin([
    'title' =>  'Update',
    'heading' => false,
]);
?>

<div class="example-wrap">
    <div class="nav-tabs-horizontal" data-plugin="tabs">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-toggle="tab" href="#exampleTabsOne" aria-controls="exampleTabsOne" role="tab">Форма</a>
            </li>
            <li class="nav-item " role="presentation">
                <a class="nav-link" data-toggle="tab" href="#exampleTabsTwo" aria-controls="exampleTabsTwo" role="tab">Товары</a>
            </li>
        </ul>
        <div class="tab-content pt-20">
            <div class="tab-pane active" id="exampleTabsOne" role="tabpanel">

                <div class="row ">
                    <div class="col-md-6">
                        <div class="example-wrap">

                            <?php

                            $form = FormWidget::begin(['id' => 'groups']);

                            $form->select(new Products(), 'id', [
                                'select' => Products::find()->all(),
                                'field' => 'id',
                                'type' => 'select2',
                                'placeholder' => $model->getAttributeLabel('id')
                            ]);

                            ?>

                            <div class="form-group">
                                <?= Html::submitButton('Добавить в группу', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                            </div>
                            <?php FormWidget::end(); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <?=

                         TableDataWidget::widget([
                              'order' => ['id'=>SORT_ASC],
                              'pagination' => false,
                              'actions' => false,
                              'model' => $products['model'],
                              'filter' => $products['filter'],
//                              'columns' => $images['columns'],
//                              'labels' => $images['labels'],
//                              'panel'   => false,
//                              'heading'   => false,
                              'data' => $products['data'],
                              'labels' => [
                                'id',
                                'name',
                                'weight',
                                'main' => 'Главный товар',
                                '<i class="icon wb-edit"></i>', '<i class="icon wb-close"></i>'
                              ],
                              'columns' => [
                                  'id',
                                  'name' => function($model) {

                                          $product = Products::find()->where(['id'=>$model->product_id])->one();
                                          return $product->name;
                                  },
                                  'weight' => function($model) {

                                          $product = Products::find()->where(['id'=>$model->product_id])->one();
                                          return $product->weight;
                                      },
                                  'main' => function($model) {

                                          $product = Products::find()->where(['id'=>$model->product_id])->one();
                                          return \yii\helpers\Html::tag('i ', '', ['class' => 'icon wb-'.($product->main ? 'check color-success' : 'close color-danger opacity-50')]);
                                  },
                                  'edit' => function ($model) {

                                          $product = Products::find()->where(['id'=>$model->product_id])->one();
                                          $url = Yii::$app->getUrlManager()->createUrl(['products/'.$product->id]); //$model->id для AR
                                          return \yii\helpers\Html::a('<i class="icon wb-edit" aria-hidden="true"></i>', $url,
                                              ['class' => 'btn btn-sm btn-icon btn-flat btn-default update',
                                                  'title' => Yii::t('yii', 'Редактировать'),
                                                  'data-pjax' => '0']);
                                  },
                                  'delete' => function ($model) {

                                          $url = Yii::$app->getUrlManager()->createUrl([Yii::$app->controller->id.'/'.$model->group_id.'/products/'.$model->id.'/delete']); //$model->id для AR
                                          return \yii\helpers\Html::a( '<i class="icon wb-close" aria-hidden="true"></i>', $url,
                                              [
                                                  'title' => Yii::t('yii', 'Удалить'), 'class' => 'btn btn-sm btn-icon btn-flat btn-danger',
                                                  'data' => [
                                                      'confirm' => 'Are you sure you want to delete this item?',
                                                      'method' => 'post',
                                                  ] ]);
                                      }
                              ],

                          ]);  ?>

                    </div>
                </div>

            </div>
            <div class="tab-pane" id="exampleTabsTwo" role="tabpanel">

                <div class="row">
                    <div class="col-md-12">

                        <?=

                         TableDataWidget::widget([
                              'order' => ['id'=>SORT_ASC],
                              'pagination' => false,
                              'actions' => false,
                              'model' => $products['model'],
                              'filter' => $products['filter'],
//                              'columns' => $images['columns'],
//                              'labels' => $images['labels'],
//                              'panel'   => false,
//                              'heading'   => false,
                              'data' => $products['data'],
                              'labels' => [
                                'id',
                                'name',
                                'weight',
                                'main' => 'Главный товар',
                                '<i class="icon wb-edit"></i>', '<i class="icon wb-close"></i>'
                              ],
                              'columns' => [
                                  'id',
                                  'name' => function($model) {

                                          $product = Products::find()->where(['id'=>$model->product_id])->one();
                                          return $product->name;
                                  },
                                  'weight' => function($model) {

                                          $product = Products::find()->where(['id'=>$model->product_id])->one();
                                          return $product->weight;
                                      },
                                  'main' => function($model) {

                                          $product = Products::find()->where(['id'=>$model->product_id])->one();
                                          return \yii\helpers\Html::tag('i ', '', ['class' => 'icon wb-'.($product->main ? 'check color-success' : 'close color-danger opacity-50')]);
                                  },
                                  'edit' => function ($model) {

                                          $product = Products::find()->where(['id'=>$model->product_id])->one();
                                          $url = Yii::$app->getUrlManager()->createUrl(['products/'.$product->id]); //$model->id для AR
                                          return \yii\helpers\Html::a('<i class="icon wb-edit" aria-hidden="true"></i>', $url,
                                              ['class' => 'btn btn-sm btn-icon btn-flat btn-default update',
                                                  'title' => Yii::t('yii', 'Редактировать'),
                                                  'data-pjax' => '0']);
                                  },
                                  'delete' => function ($model) {

                                          $url = Yii::$app->getUrlManager()->createUrl([Yii::$app->controller->id.'/'.$model->group_id.'/products/'.$model->id.'/delete']); //$model->id для AR
                                          return \yii\helpers\Html::a( '<i class="icon wb-close" aria-hidden="true"></i>', $url,
                                              [
                                                  'title' => Yii::t('yii', 'Удалить'), 'class' => 'btn btn-sm btn-icon btn-flat btn-danger',
                                                  'data' => [
                                                      'confirm' => 'Are you sure you want to delete this item?',
                                                      'method' => 'post',
                                                  ] ]);
                                      }
                              ],

                          ]);  ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php PanelWidget::end();?>

