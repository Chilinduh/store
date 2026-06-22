
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


Сделать описание карточки товара <br><Br>

1) краткое описание товара до 500 символов (не использовать слова - доставка по россии)<br>
2) полное описание товара (не использовать таблицы, от 3000 символов)<br>
3) описание для ключевых слов title, keywords, description (от 150 до 250 символов), в ключевых словах использовать слова: цена, доставка по России<br>
<br><BR>
Список товаров:

<br><BR>

<?php

foreach($products as $item) {
//'.(strlen($model->announce)).'/'.(strlen($model->description)).'/'.(strlen($model->tag_title)).'/'.(strlen($model->tag_keywords)).'/'.(strlen($model->tag_description)).'
echo $item['name'].'<br>';

}

echo PanelWidget::finish();