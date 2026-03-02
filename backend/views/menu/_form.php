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
              <a class="nav-link active" data-toggle="tab" href="#exampleTabsOne"
                                                        aria-controls="exampleTabsOne" role="tab">Форма</a></li>
        </ul>
        <div class="tab-content pt-20">
            <div class="tab-pane active" id="exampleTabsOne" role="tabpanel">

                <div class="row">
                    <div class="col-md-6">
                        <div class="example-wrap">

                            <?php

                            $form = FormWidget::begin([ 'id' => 'menu']);

                            $form->text($model, 'name', [
                                'placeholder' => $model->getAttributeLabel('name')
                            ]);

                            $form->select($model, 'parent_id', [
                                'select' => $data->all(),
                                'field' => 'id',
                                'type' => 'select'
                            ]);

                            $form->text($model, 'url', [
                                'placeholder' => $model->getAttributeLabel('url')
                            ]);

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

        </div>
    </div>
</div>

<?php PanelWidget::end();?>

