<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yiister\gentelella\widgets\Panel;
use yii\helpers\ArrayHelper;
use app\components\PanelWidget;
use kartik\form\ActiveForm;
use kartik\color\ColorInput;
use kartik\checkbox\CheckboxX;
use common\models\OrderStatus;
use app\components\BreadcrumbWidget;
use kartik\select2\Select2;
?>


<?php

$this->title = 'Цвета';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= BreadcrumbWidget::widget([
  'title' => 'Заказы',
  'createUrl' => '/orders/create',
  'breadcrumbs' => [
    [
      'label' => 'Заказы - '.($model->id ? 'редактировать' : 'создать'),
      'url' => '/orders'
    ]
  ]
]);
?>

<?= PanelWidget::start();  ?>

    <?php

    $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id'); ?>
    <?= $form->field($model, 'price'); ?>

    <?= $form->field($model, 'status_id')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(OrderStatus::Statuses(), 'id', 'name'),
    ]); ?>

    <?= $form->field($model, 'comment'); ?>
    <?= $form->field($model, 'created_at'); ?>


    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>
    <?= PanelWidget::finish();  ?>


