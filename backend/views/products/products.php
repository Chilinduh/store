<?php

use app\components\TableDataWidget;
use app\components\PanelWidget;
use app\components\FormWidget;
use backend\models\Menu;
use common\models\Stocks;
use common\models\City;
use common\models\Category;
use common\models\PackagingType;
use common\models\Manufacturers;
use common\models\Colors;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;

?>

<?php
use yii\widgets\Breadcrumbs;
?>

<div class="page-header">
  <?php
  $menu = Menu::menu(['url' => Yii::$app->controller->id])->one();
  ?>
  <h1 class="page-title"><?= $menu->name; ?></h1>
  <?php
  echo Breadcrumbs::widget([
    'tag' => 'ol',
    'itemTemplate' => '<li class="breadcrumb-item">{link}</li>',
    'homeLink' => ['label' => 'Главная ', 'url' => '/'],
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]);
  ?>
  <div class="page-header-actions"></div>
</div>

<?php

$form = FormWidget::begin(['id' => $model->formName(), 'form_class' => '']);

echo '<div class="row">';
echo '<div class="col-md-2">';
$form->text($model, 'name', [
  'label' => $model->getAttributeLabel('name')
]);
echo '</div>';
echo '<div class="col-md-2">';

$form->select($model, 'city_id', [
  'select' => City::getAll(),
  'field' => 'id',
  'type' => 'select2',
  'label' => $model->getAttributeLabel('city_id')
]);
echo '</div>';
echo '<div class="col-md-2">';
$form->select($model, 'category_id', [
  'select' => Category::Category(),
  'field' => 'id',
  'type' => 'select2',
  'label' => $model->getAttributeLabel('category_id')
]);
echo '</div>';
echo '<div class="col-md-2">';
$form->select($model, 'packaging_type_id', [
  'select' => PackagingType::getAll(),
  'field' => 'id',
  'type' => 'select2',
  'placeholder' => $model->getAttributeLabel('packaging_type_id')
]);
echo '</div>';
echo '</div>';

?>
<div class="form-group">
  <?= Html::submitButton('Поиск', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<?php FormWidget::end(); ?>

<?php echo $this->context->renderPartial('_table', [
  'model' => $model,
  'filter' => $filter,
  'columns' => $columns,
  'labels' => $labels,
  'data' => $data,
]); ?>

<?php

/*  //          $('form#{$model->formName()}').on('beforeSubmit', function(e){ */
$this->registerJs("(function () {

          $('#form-" . $model->formName() . "').on('submit', function(e){

            var form=$(this);
            $.post(
                form.attr('" . $model->formName() . "'),
                form.serialize()
            )
            .done(function(result){

            console.log('resultresultresult',result);
                $('#" . $model->formName() . "').find('.panel-body').html(result);

            }).fail(function(){
                console.log('Server error');
            });
            return false;
        });
                })();", View::POS_END);

?>




