<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use app\components\PanelWidget;
use yii\helpers\Html;
use backend\models\Menu;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use app\components\BreadcrumbWidget;
use yii\widgets\Breadcrumbs;
use kartik\file\FileInput;
use kartik\checkbox\CheckboxX;
use common\models\Products;
use yii\helpers\ArrayHelper;
use common\models\Materials;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
//$parent = Menu::findOne(['id' => $menu->parent_id]);
?>
<?= BreadcrumbWidget::widget([
  'title' => 'Импорт'
]);
?>

<?= PanelWidget::start(false); ?>

<div class="card card-flush">
  <!--begin::Card header-->
  <div class="card-body pb-0">

    <?php echo $this->context->renderPartial('/products/_products', [
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'searchModel' => $searchModel,
    ]); ?>

  </div>

</div>

<?= PanelWidget::finish(false); ?>
