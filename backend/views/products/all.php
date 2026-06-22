
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


для каждого товара сделать описание карточки, согласно пунктам ниже<br><Br>

1) краткое описание товара до 500 символов (не использовать слова - доставка по россии, гарантия)<br>
2) полное описание товара (не использовать таблицы, от 3000 символов)<br>
3) описание для ключевых слов title, keywords, description (от 150 до 250 символов), в ключевых словах использовать слова: цена, доставка по России, гарантия<br>
<br><BR>
Список товаров:

<br><BR>

<?php

foreach($products as $item) {
//'.(strlen($model->announce)).'/'.(strlen($model->description)).'/'.(strlen($model->tag_title)).'/'.(strlen($model->tag_keywords)).'/'.(strlen($model->tag_description)).'
echo '<a href="'.Yii::$app->params['adminUrl'].'/products/'.$item['id'].'" target="_blank">'.$item['name'].'</a><br>';

}

echo PanelWidget::finish();