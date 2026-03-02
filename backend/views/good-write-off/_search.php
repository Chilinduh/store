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
use yii\web\JsExpression;
use yii\web\View;

?>

<?php

$form = ActiveForm::begin(['method' => 'POST', 'id' => 'search-form', 'validateOnSubmit' => false]); ?>

<div class="row">
  <div class="col-md-4">
    <?= $form->field($goodStorageSearch, 'code')->label('Создать СПИСАНИЕ');; ?>
  </div>
  <div class="col-md-2">
    <?= $form->field($goodStorageSearch, 'count'); ?>
  </div>
</div>
<div class="row hide">
  <div class="col-md-6">
    <?php

    echo $form->field($goodStorageSearch, 'name')->widget(
      \kartik\select2\Select2::class,
      [
        'data' => [],
        'options' => [
          'prompt' => 'Выберите ',
          'id' => 'good-storage',
        ],
        'pluginOptions' => [
          'minimumInputLength' => 3,
          'allowClear' => true,
          'ajax' => [
            'url' => \yii\helpers\Url::to(['/good-storage/goods']),
            'dataType' => 'json',
            'delay' => 250,
            'cache' => true,
            'data' => new JsExpression('function(params) { return {term:params.term}; }'),
            'results' => new JsExpression('function(data,page) { return {results:data.results};}')
          ],
          'templateResult' => new JsExpression('function(good) { return good.name; }'),
          'escapeMarkup' => new JsExpression('function (good) { return good; }'),
          'templateSelection' => new JsExpression('function (good) { return good.name; }'),
        ],
      ]);

    ?>
  </div>
</div>
<?= Html::submitButton('Создать СПИСАНИЕ', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
<?php

$script = <<< JS

     $('#search-form').on('submit', function (e) {

      e.preventDefault();
      $.ajax({
        url: "/good-write-off/add-request",
        data: $('#search-form').serialize(),
        method: 'POST',
        dataType: 'json',
        success: function (data) {
          $('#code').val('');
          $('#count').val(1);
          $('.btn-outline-secondary').click();
          $('#code').focus();
          $('#code').setCursorPosition(1);
          window.location.reload();
        },
        error: function (response) {
          console.log(response);
        }
      });

      return false;
    });
JS;

$this->registerJs($script, View::POS_END);
?>
