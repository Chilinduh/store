<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use yii\helpers\Html;
use backend\models\Menu;
use yii\widgets\Breadcrumbs;
use common\models\Category;
use yii\widgets\ActiveForm;
use yiister\gentelella\widgets\Panel;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

echo $this->render('_breadcrumbs', [
  'model' => $model,
  'category' => $category
])

?>

<div class="row">
  <div class="col-md-12">
    <?php

    Panel::begin(
      [
        'header' => Html::encode($this->title),
        'icon' => '',
      ]
    );
    ?>
    <div class="row ">
      <div class="col-md-12">

        <?php

        $form = ActiveForm::begin(); ?>
        <!---->
        <!--        --><?//= $form->field($model, 'parent_id')->widget(Select2::classname(), [
        //          'data' => Category::CategoryList(['parent_id' => $model->id??0]),
        //          'options' => ['placeholder' => 'Выбрать категорию'],
        //        ]); ?>

        <?= $form->field($model, 'name'); ?>

        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>
      </div>
    </div>

    <?php Panel::end() ?>
  </div>
</div>
