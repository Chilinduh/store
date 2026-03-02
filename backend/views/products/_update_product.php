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
use common\models\Property;
use app\components\BreadcrumbWidget;
use yii\widgets\Breadcrumbs;
use kartik\file\FileInput;
use kartik\checkbox\CheckboxX;
use kartik\editors\Summernote;

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

<?= PanelWidget::start(false); ?>

<div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10">
  <!--begin::Card body-->
  <?php require_once('_tabs.php'); ?>
  <!--end::Card body-->
</div>
<div class="card card-flush">
  <!--begin::Card header-->
  <div class="card-body pb-0">
    <div class="row">
      <!--begin::Col-->
      <div class="col-md-8">
        <?php

        $form = ActiveForm::begin();
        echo $form->field($model, 'name');

        echo $form->field($model, 'city_id')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(City::getAll(), 'id', 'name'),
          'options' => ['placeholder' => 'Выбрать город'],
          'pluginOptions' => [
            'allowClear' => true
          ],
        ]);

        echo $form->field($model, 'category_id')->widget(
          TreeViewInput::className(),
          [
            // single query fetch to render the tree
            'query' => Tree::find()->addOrderBy('root, lft'),
            'headingOptions' => ['label' => 'Categories'],
            'name' => 'Products[category_id]',    // input name
            'asDropdown' => true,            // will render the tree input widget as a dropdown.
            'multiple' => false,            // set to false if you do not need multiple selection
            'fontAwesome' => false,            // render font awesome icons
            'rootOptions' => [
              'label' => '<i class="fa fa-tree"></i>',
              'class' => 'text-success'
            ],                                      // custom root label
          ]
        );

        echo $form->field($model, 'attribute_group_id')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(\common\models\AttributesGroups::find()->asArray()->all(), 'id', 'name'),
          'options' => ['placeholder' => 'Выбрать группу атрибутов'],
          'pluginOptions' => [
            'allowClear' => true
          ],
        ]);

        echo $form->field($model, 'manufacturer_id')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(Manufacturers::Manufacturers(), 'id', 'name'),
          'options' => ['placeholder' => 'Выбрать производителя'],
          'pluginOptions' => [
            'allowClear' => true
          ],
        ]);

        echo $form->field($model, 'brand_id')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(Brands::Brands(), 'id', 'name'),
          'options' => ['placeholder' => 'Выбрать бренд'],
          'pluginOptions' => [
            'allowClear' => true
          ],
        ]);

        echo $form->field($model, 'price');

        echo $form->field($model, 'show_previous_price')->widget(CheckboxX::classname(), [
          //'autoLabel' => true,
          'labelSettings' => [
            'label' => $model->getAttributeLabel('show_previous_price').' ( Предыдущая цена '.($model->previousPrice->price??'').')'
          ],
          'pluginOptions' => [
            'threeState' => false,
            'size' => 'md'
          ]
        ])->label(false);

        echo $form->field($model, 'weight');
        echo $form->field($model, 'code');

        echo $form->field($model, 'color_id')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(Colors::Colors(), 'id', 'name'),
          'options' => ['placeholder' => 'Выбрать цвет'],
          'pluginOptions' => [
            'allowClear' => true
          ],
        ]);

        echo $form->field($model, 'property_id')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(Property::Property(), 'id', 'name'),
          'options' => ['placeholder' => 'Выбрать свойство'],
          'pluginOptions' => [
            'allowClear' => true
          ],
        ]);

        echo $form->field($model, 'description')->widget(Summernote::class, [
          'useKrajeePresets' => true,
          // other widget settings
        ]);

        echo $form->field($model, 'main')->widget(CheckboxX::classname(), [
          'autoLabel' => true,
          'pluginOptions' => [
            'threeState' => false,
            'size' => 'md'
          ]
        ])->label(false);

        echo $form->field($model, 'show')->widget(CheckboxX::classname(), [
          'autoLabel' => true,
          'pluginOptions' => [
            'threeState' => false,
            'size' => 'md'
          ]
        ])->label(false);
        ?>

        <div class="form-group">
          <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
      </div>
    </div>
  </div>

</div>

<?= PanelWidget::finish(false); ?>
