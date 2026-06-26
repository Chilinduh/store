
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

?>

Список товаров:

<br><BR>
<?php

foreach($products as $item) {

//'.(strlen($model->announce)).'/'.(strlen($model->description)).'/'.(strlen($model->tag_title)).'/'.(strlen($model->tag_keywords)).'/'.(strlen($model->tag_description)).'
echo '<a href="'.Yii::$app->params['adminUrl'].'/products/'.$item['id'].'" target="_blank">'.$item['name'].'</a><br>';
?>

Сделать для товара <?= $item['name'] ?>

не использовать вертикальную черту в текстах

1) краткое описание до 500 символов (не использовать слова - доставка по россии)<br>
2) полное описание товар (не использовать таблицы, от 3000 символов) <br>
3) описание для ключевых слов title, keywords, description (от 150 до 250 символов), в ключевых словах использовать слова: цена, доставка по России<br><br>

переделать и продолжить описание (убрать все иконки):<br><br>
<?= $item['description'] ?>
<br>
<hr>
<BR>

<?php
}

echo PanelWidget::finish();