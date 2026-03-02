<?php

use backend\models\Menu;
use yii\widgets\Breadcrumbs;
use common\models\Category;

?>

<div class="page-header">
  <?php
  $menu = Menu::menu(['url' => Yii::$app->controller->id])->one();
  $parent = Menu::menu(['id' => $menu->parent_id])->one();
  $this->params['breadcrumbs'][] = ['class' => 'breadcrumb-item', 'label' => $menu->name, 'url' => [Yii::$app->getUrlManager()->createUrl([$menu->url])]];

  if ($model) {

    //подкатегория
    if ($category) {

      $url = Yii::$app->getUrlManager()->createUrl([Yii::$app->controller->id . '/' . $category->id]);
      $this->params['breadcrumbs'][] = [
        'class' => 'breadcrumb-item',
        'label' => $category->name,
        'url' => $url
      ];

      $sub = Category::find()->where(['id' => $category->parent_id])->one();
      if ($sub) {
        $url .= Yii::$app->getUrlManager()->createUrl(['/sub/' . $sub->id]);
        $this->params['breadcrumbs'][] = [
          'class' => 'breadcrumb-item',
          'label' => $sub->name,
          'url' => $url
        ];
      }
    }

    $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ''];
  }

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
