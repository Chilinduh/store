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
use app\components\BreadcrumbWidget;
?>

<?= BreadcrumbWidget::widget([
  'title' => 'Пользователи - Создание',
  'createUrl' => '/user/create',
]);
?>

<?= PanelWidget::start();  ?>

    <?php

    $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username'); ?>
    <?= $form->field($model, 'password'); ?>
    <?= $form->field($model, 'first_name'); ?>
    <?= $form->field($model, 'last_name'); ?>
    <?= $form->field($model, 'phone'); ?>
    <?= $form->field($model, 'country'); ?>
    <?= $form->field($model, 'city'); ?>
    <?= $form->field($model, 'address'); ?>

    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>
  </div>
</div>
<?php PanelWidget::finish() ?>


