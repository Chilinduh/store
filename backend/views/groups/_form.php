<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use yii\helpers\Html;
use app\components\PanelWidget;
use kartik\form\ActiveForm;
use app\components\BreadcrumbWidget;
use backend\models\Menu;
use common\models\Groups;


$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
?>


<?= BreadcrumbWidget::widget([
  'title' => 'Группы',
  'createUrl' => '/groups/create',
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $model->name]
  ]
]);
?>

<?= PanelWidget::start(); ?>

<?php

$form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name'); ?>
<?= $form->field($model, 'description')->textarea(['rows' => '6']); ?>


<?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
<?php PanelWidget::finish() ?>


