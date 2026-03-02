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
                <a class="nav-link <?= $model->isNewRecord ? 'disabled' : '' ?>" data-toggle="tab" href="#exampleTabsTwo" 
                   aria-controls="exampleTabsTwo" role="tab">Изображения</a>
            </li>
        </ul>
        <div class="tab-content pt-20">
            <div class="tab-pane active" id="exampleTabsOne" role="tabpanel">

                <div class="row ">
                    <div class="col-md-6">
                        <div class="example-wrap">

                            <?php

                            $form = FormWidget::begin(['id' => 'products']);

                            $form->text($model, 'name', [
                                'placeholder' => $model->getAttributeLabel('name')
                            ]);

                            $form->select($model, 'city_id', [
                                'select' => City::getAll(),
                                'field' => 'id',
                                'type' => 'select2',
                                'placeholder' => $model->getAttributeLabel('city_id')
                            ]);

                            $form->select($model, 'category_id', [
                                'select' => Category::Category(),
                                'field' => 'id',
                                'type' => 'select2',
                                'placeholder' => $model->getAttributeLabel('category_id')
                            ]);

                            $form->select($model, 'manufacturer_id', [
                                'select' => Manufacturers::Manufacturers(),
                                'field' => 'id',
                                'type' => 'select2',
                                'placeholder' => $model->getAttributeLabel('manufacturer_id')
                            ]);

                            $form->textarea($model, 'description', [
                                'placeholder' => $model->getAttributeLabel('description')
                            ]);
                            
                            $form->text($model, 'weight', [
                                'placeholder' => $model->getAttributeLabel('weight')
                            ]);

                            $form->checkbox($model, 'main',[
                                'placeholder' => $model->getAttributeLabel('main')
                            ]);
                            $form->checkbox($model, 'show',[
                                'placeholder' => $model->getAttributeLabel('show')
                            ]);

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
                    <div class="col-md-6">
                                                
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

                <div class="row">
                    <div class="col-md-12">
                        <?=
                        
                         TableDataWidget::widget([
                              'order' => ['id'=>SORT_ASC],
                              'pagination' => false,
                              'actions' => false,
                              'model' => $images['model'],
                              'filter' => $images['filter'],
//                              'columns' => $images['columns'],
//                              'labels' => $images['labels'],
//                              'panel'   => false,
//                              'heading'   => false,
                              'data' => $images['data'],
                              'labels' => [
                                'id',
                                'thumbnail',
                                'table_name',
                                'table_id',
                                'show',
                                '<i class="icon wb-edit"></i>', '<i class="icon wb-close"></i>'
                              ],
                              'columns' => [
                                  'id',
                                  'thumbnail' => function($model) {
                                          return \yii\helpers\Html::a(\yii\helpers\Html::img('http://theme'.$model->thumbnail,[
                                                      'style' => ['border' => '4px solid #efefef'], 'width' => '50px'
                                                  ]), 'http://theme'.$model->original,[]);
                                  },
                                  'table_name',
                                  'table_id',                                  
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

                                          $url = Yii::$app->getUrlManager()->createUrl([Yii::$app->controller->id.'/'.$model->table_id.'/images/'.$model->id.'/delete']); //$model->id для AR
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

