<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use app\components\TableDataWidget;
use app\components\PanelWidget;
use yii\helpers\Html;
use app\components\FormWidget;
use common\models\Manufacturers;
use common\models\Category;
use common\models\City;
use common\models\Ingredients;
use common\models\Colors;
use backend\models\Menu;
use common\models\PackagingType;
use kartik\tree\TreeViewInput;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use common\models\Tree;
use yii\helpers\ArrayHelper;
use common\models\Brands;
use app\components\BreadcrumbWidget;
use yii\widgets\Breadcrumbs;
use kartik\file\FileInput;


$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
//$parent = Menu::findOne(['id' => $menu->parent_id]);
?>


<?= BreadcrumbWidget::widget([
  'title' => 'Товары',
  'createUrl' => '/products/create',
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $model->name]
  ]
]);
?>

<?= PanelWidget::start(); ?>

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
      <li class="nav-item " role="presentation">
        <a class="nav-link <?= $model->isNewRecord ? 'disabled' : '' ?>" data-toggle="tab" href="#exampleTabsThree"
           aria-controls="exampleTabsTwo" role="tab">Материалы</a>
      </li>

    </ul>
    <div class="tab-content pt-20">
      <div class="tab-pane active" id="exampleTabsOne" role="tabpanel">

        <div class="row ">
          <div class="col-md-6">
            <div class="example-wrap">

              <?php

              $form = ActiveForm::begin();
              echo $form->field($model, 'name');

              echo $form->field($model, 'city_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(City::getAll(), 'id', 'name'),
              ]);

              echo TreeViewInput::widget([
                // single query fetch to render the tree
                'query' => Tree::find()->addOrderBy('root, lft'),
                'headingOptions' => ['label' => 'Categories'],
                'name' => 'Products[category_id]',    // input name
                'value' => $model->category_id,         // values selected (comma separated for multiple select)
                'asDropdown' => true,            // will render the tree input widget as a dropdown.
                'multiple' => false,            // set to false if you do not need multiple selection
                'fontAwesome' => false,            // render font awesome icons
                'rootOptions' => [
                  'label' => '<i class="fa fa-tree"></i>',
                  'class' => 'text-success'
                ],                                      // custom root label
                //'options'         => ['disabled' => true],
              ]);

              echo $form->field($model, 'manufacturer_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Manufacturers::Manufacturers(), 'id', 'name'),
              ]);

              echo $form->field($model, 'brand_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Brands::Brands(), 'id', 'name'),
              ]);

              echo $form->field($model, 'price');
              echo $form->field($model, 'weight');
              echo $form->field($model, 'code');

              echo $form->field($model, 'color_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Colors::Colors(), 'id', 'name'),

              ]);

              echo $form->field($model, 'description')->textarea(['rows' => '6']);
              echo $form->field($model, 'main')->checkbox()->label($model->getAttributeLabel('main'));
              echo $form->field($model, 'show')->checkbox()->label($model->getAttributeLabel('show'));
              ?>

              <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
              </div>

              <?php ActiveForm::end(); ?>
            </div>
          </div>
        </div>

      </div>
      <div class="tab-pane" id="exampleTabsTwo" role="tabpanel">
        <div class="row">
          <div class="col-md-6">

<!--            --><?php //$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<!---->
<!---->
<!--            --><?php //echo $form->field($model, 'file')->widget(FileInput::classname(), [
//              'options' => ['overwriteInitial '=>false, 'multiple' => true, 'accept' => 'image/*'],
//              'pluginOptions' => [
//                'showPreview' => false,
//                'showCaption' => true,
//                'showRemove' => true,
//                'showUpload' => false
//              ]
//            ]);
//            ?>
<!---->
<!--            <div class="form-group">-->
<!--              --><?//= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
<!--            </div>-->
<!--            --><?php //ActiveForm::end(); ?>

            <?php $form = FormWidget::begin(['id' => 'crop', 'type' => 'multipart/form-data']); ?>

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
            <?php if (!$model->isNewRecord) { ?>

              <?php

              echo TableDataWidget::widget([
                'order' => ['id' => SORT_ASC],
                'pagination' => false,
                'actions' => false,
                'model' => $images['model'],
                'filter' => $images['filter'],
                'panel' => false,
                'heading' => false,
                'data' => $images['data'],
                'labels' => [
                  'id',
                  'thumbnail',
                  'table_name',
                  'table_id',
                  'main' => 'Главное изображение',
                  'show',
                  '<i class="icon wb-edit"></i>', '<i class="icon wb-close"></i>'
                ],
                'columns' => [
                  'id',
                  'thumbnail' => function ($model) {
                    return \yii\helpers\Html::a(\yii\helpers\Html::img(Yii::$app->params['imageUrl'] . $model->thumbnail, [
                      'style' => ['border' => '4px solid #efefef'], 'width' => '50px'
                    ]), Yii::$app->params['imageUrl'] . $model->original, []);
                  },
                  'table_name',
                  'table_id',
                  'main' => function ($model) {
                    $form = FormWidget::begin([
                      'id' => 'Files' . $model->id,
                      'action' => '/files/' . $model->id . '/update']);
                    $form->checkbox($model, 'main', ['submit' => true, 'placeholder' => $model->getAttributeLabel('id')]);
                    FormWidget::end();
                  },
                  'show' => function ($model) {
                    return \yii\helpers\Html::tag('i ', '', ['class' => 'icon wb-' . ($model->show ? 'check color-success' : 'close color-danger opacity-50')]);
                  },
                  'edit' => function ($model) {

                    $url = Yii::$app->getUrlManager()->createUrl([Yii::$app->controller->id . '/' . $model->id]);
                    return \yii\helpers\Html::a('<i class="icon wb-edit" aria-hidden="true"></i>', $url,
                      ['class' => 'btn btn-sm btn-icon btn-flat btn-default update',
                        'title' => Yii::t('yii', 'Редактировать'),
                        'data-pjax' => '0']);
                  },
                  'delete' => function ($model) {

                    $url = Yii::$app->getUrlManager()->createUrl([Yii::$app->controller->id . '/' . $model->table_id . '/images/' . $model->id . '/delete']);
                    return \yii\helpers\Html::a('<i class="icon wb-close" aria-hidden="true"></i>', $url,
                      [
                        'title' => Yii::t('yii', 'Удалить'), 'class' => 'btn btn-sm btn-icon btn-flat btn-danger',
                      ]);
                  }
                ],

              ]);
              ?>

            <?php } ?>

          </div>
        </div>

      </div>
      <div class="tab-pane" id="exampleTabsThree" role="tabpanel">
        <div class="row ">
          <div class="col-md-6">
            <div class="example-wrap">
              <?php

              $form = ActiveForm::begin(['id' => 'ingredients', 'action' => '/products/' . $model->id . '/ingredients/create']);

              $form->field(new Ingredients(), 'id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Ingredients::find()->all(), 'id', 'name'),
                'options' => ['placeholder' => $model->getAttributeLabel('id')],
              ]);

              ?>
              <div class="form-group">
                <?= Html::submitButton('Добавить ингредиент', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
              </div>
              <?php ActiveForm::end(); ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <?php if (!$model->isNewRecord) { ?>
              <!--              -->
              <!--              --><? //=
//              TableDataWidget::widget([
//                'order' => ['id' => SORT_ASC],
//                'pagination' => false,
//                'actions' => false,
//                'model' => $ingredients['model'],
//                'filter' => $ingredients['filter'],
//                'data' => $ingredients['data'],
//                'labels' => [
//                  'id',
//                  'name',
//                  '<i class="icon wb-close"></i>'
//                ],
//                'columns' => [
//                  'id',
//                  'name' => function ($model) {
//
//                    $ingredients = Ingredients::find()->where(['id' => $model->ingredient_id])->one();
//                    return $ingredients->name;
//
//                  },
//                  'delete' => function ($model) {
//
//                    $url = Yii::$app->getUrlManager()->createUrl([Yii::$app->controller->id . '/' . $model->product_id . '/ingredients/' . $model->ingredient_id . '/delete']); //$model->id для AR
//                    return \yii\helpers\Html::a('<i class="icon wb-close" aria-hidden="true"></i>', $url,
//                      [
//                        'title' => Yii::t('yii', 'Удалить'), 'class' => 'btn btn-sm btn-icon btn-flat btn-danger',
//                        'data' => [
//                          'confirm' => 'Are you sure you want to delete this item?',
//                          'method' => 'post',
//                        ]]);
//                  }
//                ],
//
//              ]); ?>
            <?php } ?>

          </div>
        </div>
      </div>
      <div class="tab-pane" id="exampleTabsFour" role="tabpanel">
        <div class="row ">
          <div class="col-md-6">
            <div class="example-wrap">

              <?php

              $form = ActiveForm::begin(['id' => 'ingredients', 'action' => '/products/' . $model->id . '/ingredients/create']);

              $form->field(new Ingredients(), 'id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Ingredients::find()->all(), 'id', 'name'),
                'options' => ['placeholder' => $model->getAttributeLabel('id')],
              ]);

              ?>

              <div class="form-group">
                <?= Html::submitButton('Добавить ингредиент', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
              </div>
              <?php ActiveForm::end(); ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <?php if (!$model->isNewRecord) { ?>
              <!--              -->
              <!--              --><? //=
//              TableDataWidget::widget([
//                'order' => ['id' => SORT_ASC],
//                'pagination' => false,
//                'actions' => false,
//                'model' => $ingredients['model'],
//                'filter' => $ingredients['filter'],
//                'data' => $ingredients['data'],
//                'labels' => [
//                  'id',
//                  'name',
//                  '<i class="icon wb-close"></i>'
//                ],
//                'columns' => [
//                  'id',
//                  'name' => function ($model) {
//
//                    $ingredients = Ingredients::find()->where(['id' => $model->ingredient_id])->one();
//                    return $ingredients->name;
//
//                  },
//                  'delete' => function ($model) {
//
//                    $url = Yii::$app->getUrlManager()->createUrl([Yii::$app->controller->id . '/' . $model->product_id . '/ingredients/' . $model->ingredient_id . '/delete']); //$model->id для AR
//                    return \yii\helpers\Html::a('<i class="icon wb-close" aria-hidden="true"></i>', $url,
//                      [
//                        'title' => Yii::t('yii', 'Удалить'), 'class' => 'btn btn-sm btn-icon btn-flat btn-danger',
//                        'data' => [
//                          'confirm' => 'Are you sure you want to delete this item?',
//                          'method' => 'post',
//                        ]]);
//                  }
//                ],
//
//              ]); ?>
            <?php } ?>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<?= PanelWidget::finish(); ?>

