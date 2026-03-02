<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */
use app\components\TableDataWidget;
use app\components\ModalWidget;
use app\components\PanelWidget;
use app\components\GalleryWidget;
use app\components\CropWidget;
use yii\helpers\Html;
use app\components\FormWidget;
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
            <li class="nav-item" role="presentation"><a class="nav-link active" data-toggle="tab" href="#exampleTabsOne"
                                                        aria-controls="exampleTabsOne" role="tab">Форма</a></li>
            <li class="nav-item " role="presentation"><a class="nav-link <?= $model->isNewRecord ? 'disabled' : '' ?>" data-toggle="tab" href="#exampleTabsTwo"
                                                          aria-controls="exampleTabsTwo" role="tab">Цены</a></li>                                                        
            <li class="nav-item " role="presentation"><a class="nav-link <?= $model->isNewRecord ? 'disabled' : '' ?>" data-toggle="tab" href="#exampleTabsThree"
                                                          aria-controls="exampleTabsTwo" role="tab">Изображения</a></li>
        </ul>
        <div class="tab-content pt-20">
            <div class="tab-pane active" id="exampleTabsOne" role="tabpanel">

                <div class="row ">
                    <div class="col-md-6">
                        <div class="example-wrap">

                            <?php

                            $form = FormWidget::begin([ 'id' => 'user']);

                            $form->text($model, 'name', [
                                'placeholder' => $model->getAttributeLabel('name')
                            ]);

                            $form->select($model, 'city_id', [
                                'select' => City::getAll(),
                                'type' => 'select2',
                                'placeholder' => $model->getAttributeLabel('city_id')
                            ]);

                            $form->select($model, 'product_id', [
                                'select' => Products::getAll(),
                                'type' => 'select2',
                                'placeholder' => $model->getAttributeLabel('product_id')
                            ]);

                            $form->textarea($model, 'description', [
                                'placeholder' => $model->getAttributeLabel('description')
                            ]);
                            
                            $form->text($model, 'weight', [
                                'placeholder' => $model->getAttributeLabel('weight')
                            ]);

//                            $form->text($model, 'price', [
//                                'placeholder' => $model->getAttributeLabel('price')
//                            ]);

                            $form->checkbox($model, 'show');

                            ?>

                            <div class="form-group">
                                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                            </div>
                            <?php FormWidget::end(); ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane" id="exampleTabsTwo" role="tabpanel">

                <div class="row">
                    <div class="col-md-12">
                        <?=

                            TableDataWidget::widget([
                              'order' => ['id'=>SORT_ASC],
                              'pagination' => true,
                              'model' => $prices['model'],
                              'filter' => $prices['filter'],
//                              'columns' => $prices['columns'],
//                              'labels' => $prices['labels'],
                              'panel'   => false,
                              'heading'   => false,
                              'data' => $prices['data'],
                              'labels' => [
                                'value',
                                'show',
                                '<i class="icon wb-edit"></i>', '<i class="icon wb-close"></i>'
                              ],
                              'columns' => [

                                  'value' => function($model) {
                                        return $model->price()->value;
                                   },
                                  'show' => function($model) {
                                       
//                                            $form = FormWidget::begin([ 'id' => 'menu']);
//
//                                            $form->checkbox($model, 'show');
//
//                                            FormWidget::end(); 
                                          return \yii\helpers\Html::tag('i ', '', ['class' => 'icon wb-'.($model->show ? 'check color-success' : 'close color-danger opacity-50')]);
                                   },

                                  'delete' => function ($model) {

                                          $url = Yii::$app->getUrlManager()->createUrl([Yii::$app->controller->id.'/delete','id'=>$model->id]); //$model->id для AR
                                          return \yii\helpers\Html::a( '<i class="icon wb-close" aria-hidden="true"></i>', $url,
                                              [
                                                  'title' => Yii::t('yii', 'Удалить'), 'class' => 'btn btn-sm btn-icon btn-flat btn-danger',
                                                  'data' => [
                                                      'confirm' => 'Are you sure you want to delete this item?',
                                                      'method' => 'post',
                                                  ] ]);
                                      }
                              ],

                          ]) ?>                        
                        
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="exampleTabsThree" role="tabpanel">

                <div class="row">
                    <div class="col-md-12">
                        <?php
                        //                  $gallery = GalleryWidget::begin();
                        //                  $gallery->gallery($images);
                        //                  GalleryWidget::end();
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="img-container col-md-6">
                        <?php $form = FormWidget::begin([ 'id' => 'crop', 'type' => 'multipart/form-data']); ?>

                        <?php
                        $form->fileUpload($model, 'file', [

                        ]);
                        ?>

                        <div class="form-group">
                            <?= Html::submitButton('Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>
                        <?php FormWidget::end(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php PanelWidget::end();?>

