<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 22.11.11
 * Time: 15:00
 */

use app\components\BreadcrumbWidget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\components\PanelWidget;
use kartik\form\ActiveForm;
use backend\models\Menu;
use kartik\select2\Select2;
use common\models\AttributesFilters;
use Google\Service\AlertCenter\PredefinedDetectorInfo;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
?>

<?= BreadcrumbWidget::widget([
  'title' => 'Атрибуты',
  'createUrl' => '/attributes/create',
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $model->name]
  ]
]);

?>

<?= PanelWidget::start(); ?>

<div class="row ">
  <div class="col-md-12">
    <?php

    $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name'); ?>
    <?= $form->field($model, 'attribute_filter_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(AttributesFilters::Filters(), 'id', 'name'),
                'options' => ['placeholder' => $model->getAttributeLabel('attribute_filter_id')],
              ]);
    ?>

    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>
  </div>
</div>
<?php PanelWidget::finish() ?>