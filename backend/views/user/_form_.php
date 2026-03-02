<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */
use app\components\PanelWidget;
use app\components\GalleryWidget;
use app\components\CropWidget;
use yii\helpers\Html;
use app\components\FormWidget;
use app\components\ModalWidget;


//print_r($model->getImages()); 

?>

<?php
    PanelWidget::begin([
    'title' =>  'Update',
    ]);
    
    
    
?>


<div class="example-wrap">
  <div class="nav-tabs-horizontal" data-plugin="tabs">
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item" role="presentation"><a class="nav-link active" data-toggle="tab" href="#exampleTabsOne"
          aria-controls="exampleTabsOne" role="tab">Форма</a></li>
      <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#exampleTabsTwo"
          aria-controls="exampleTabsTwo" role="tab">Изображения</a></li>
    </ul>
    <div class="tab-content pt-20">
      <div class="tab-pane active" id="exampleTabsOne" role="tabpanel">

            <div class="row ">
                <div class="col-md-6">
                    <div class="example-wrap">

                    <?php

                        $form = FormWidget::begin([ 'id' => 'user']);

                        $form->text($model, 'username', [
                            'placeholder' => $model->getAttributeLabel('username')
                        ]);

                        $form->text($model, 'email', [
                            'placeholder' => $model->getAttributeLabel('email')
                        ]);

                        $form->text($model, 'phones', [
                            'placeholder' => $model->getAttributeLabel('phones')
                        ]);
                        

//                        $form->datetime($model, 'created_at', [
//                            'placeholder' => $model->getAttributeLabel('created_at')
//                        ]);
//
//                        $form->clockPicker($model, 'created_at', [
//                            'placeholder' => $model->getAttributeLabel('created_at')
//                        ]);
                    ?>

                        <div class="form-group">
                            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>
                    <?php FormWidget::end(); ?>
                    </div>
                </div>
            </div>

      </div>
      <div class="tab-pane" id="exampleTabsTwo" role="tabpanel" ng-show="0">

          <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">
              Launch demo modal
          </a>

          <?= ModalWidget::widget([
              'id' => 'modal',
              'title' => 'title',
              'content' => function() {
              }
          ]);
          ?>

          <div class="row">
              <div class="col-md-12">
                  <?= GalleryWidget::widget([
                          'images' => $images
                        ]);
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



