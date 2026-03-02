<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\components\PanelWidget;
use kartik\form\ActiveForm;
use app\components\BreadcrumbWidget;
use backend\models\Menu;
use common\models\Groups;
use common\models\Tree;
use kartik\select2\Select2;
use kartik\tree\TreeViewInput;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
?>


<?= BreadcrumbWidget::widget([
  'title' => 'Группа категорий',
  'createUrl' => '/category-groups/create',
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => ($model->group->name??'').' '.($model->category->name??'')]
  ]
]);
?>

<?= PanelWidget::start(); ?>

<?php

$form = ActiveForm::begin(); ?>

<?= $form->field($model, 'group_id')->widget(Select2::classname(), [
  'data' => ArrayHelper::map(Groups::find()->all(), 'id', 'name'),
]); ?>

<?php echo TreeViewInput::widget([
  // single query fetch to render the tree
  'query' => Tree::find()->addOrderBy('root, lft'),
  'headingOptions' => ['label' => 'Categories'],
  'name' => 'CategoryGroups[category_id]',    // input name
  'value' => $model->category_id,         // values selected (comma separated for multiple select)
  'asDropdown' => true,            // will render the tree input widget as a dropdown.
  'multiple' => false,            // set to false if you do not need multiple selection
  'fontAwesome' => false,            // render font awesome icons
  'rootOptions' => [
    'label' => '<i class="fa fa-tree"></i>',
    'class' => 'text-success'
  ],                                      // custom root label
  //'options'         => ['disabled' => true],
]); ?>


<?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
<?php PanelWidget::finish() ?>


