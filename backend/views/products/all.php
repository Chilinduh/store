
<?php
use app\components\BreadcrumbWidget;
use app\components\PanelWidget;
?>


<?= BreadcrumbWidget::widget([
  'title' => 'Все товары',
]);
?>

<?php
echo PanelWidget::start();

foreach($products as $item) {
//'.(strlen($model->announce)).'/'.(strlen($model->description)).'/'.(strlen($model->tag_title)).'/'.(strlen($model->tag_keywords)).'/'.(strlen($model->tag_description)).'
echo $item['name'].'<br>';

}

echo PanelWidget::finish();