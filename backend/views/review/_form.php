<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use app\components\PanelWidget;
use yii\helpers\Html;
use app\components\FormWidget;
use common\models\Products;
use common\models\City;
use common\models\User;
use backend\models\Menu;
?>

<?php 

use yii\widgets\Breadcrumbs;

?>

<div class="page-header">
    <?php 
        $menu = Menu::menu(['url' => Yii::$app->controller->id])->one();
        $parent = Menu::menu(['id' => $menu->parent_id])->one();
        $this->params['breadcrumbs'][] = ['class'=>'breadcrumb-item', 'label' => $menu->name, 'url' => [Yii::$app->getUrlManager()->createUrl( [$menu->url])]  ];
        $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => '' ];
    ?>
    <h1 class="page-title"><?= $menu->name; ?></h1>
    <?php 
    echo Breadcrumbs::widget([
        'tag' => 'ol',
        'itemTemplate' => '<li class="breadcrumb-item">{link}</li>',
        'homeLink' => ['label' => 'Главная ', 'url' => '/'], 
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]); 
    ?>
   <div class="page-header-actions"></div>
</div>

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
        </ul>
        <div class="tab-content pt-20">
            <div class="tab-pane active" id="exampleTabsOne" role="tabpanel">

                <div class="row ">
                    <div class="col-md-6">
                        <div class="example-wrap">

                            <?php
                            
                            $form = FormWidget::begin([ 'id' => 'review']);

                            $form->text($model, 'name', [
                                'placeholder' => $model->getAttributeLabel('name')
                            ]);

                            $form->select($model, 'user_id', [
                                'select' => User::users()->all(),
                                'field' => 'id',
                                'type' => 'select2',
                                'display' => 'username'
                            ]);

                            $form->select($model, 'product_id', [
                                'select' => Products::products()->all(),
                                'field' => 'id',
                                'type' => 'select2'
                            ]);

                            $form->select($model, 'city_id', [
                                'select' => City::getAll(),
                                'field' => 'id',
                                'type' => 'select2'
                            ]);


                            $form->textarea($model, 'positive', [
                                'placeholder' => $model->getAttributeLabel('positive')
                            ]);
                            $form->textarea($model, 'negative', [
                                'placeholder' => $model->getAttributeLabel('negative')
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

        </div>
    </div>
</div>

<?php PanelWidget::end();?>

