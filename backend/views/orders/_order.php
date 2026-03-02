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
use backend\models\Menu;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use app\components\BreadcrumbWidget;
use yii\widgets\Breadcrumbs;
use kartik\file\FileInput;
use kartik\checkbox\CheckboxX;
use common\models\User;
use common\models\OrderStatus;
use yii\helpers\ArrayHelper;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
//$parent = Menu::findOne(['id' => $menu->parent_id]);
?>

<?= BreadcrumbWidget::widget([
  'title' => 'Заказы',
  'createUrl' => '/orders/create',
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $model->id]
  ]
]);
?>

<?= PanelWidget::start(false); ?>

<div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10">
  <?php
  echo $this->context->renderPartial('_tabs', [
    'model' => $model,
    'order' => $order
  ]);
  ?>
</div>
<div class="card card-flush">
  <!--begin::Card header-->
  <div class="card-body pb-0">

    <div class="row">
      <!--begin::Col-->
      <div class="col-md-8">
        <?php

        $form = ActiveForm::begin();
        echo $form->field($model, 'id');

//        echo $form->field($model, 'user_id')->widget(Select2::classname(), [
//          'data' => ArrayHelper::map(UserProfile::getAll(), , 'id', 'first_name'),
//        ]);

        echo $form->field($model, 'status_id')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(OrderStatus::Statuses(), 'id', 'name'),
        ]);

        echo $form->field($model, 'price');

        echo $form->field($model, 'comment')->textarea(['rows' => '6']);
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
