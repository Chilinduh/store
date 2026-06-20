<?php

use common\models\Files;
use common\models\CategoryKeywords;

$file = Files::find()->where(['table_id' => $node->id, 'table_name' => 'category'])->one();
$categoryKeywords = CategoryKeywords::find()->where(['category_id' => $node->id])->one();

?>

<div class="row">
  <div class="col-sm-8">

    <?php if ($file) { ?>
      <img src="<?= Yii::$app->params['imageUrl'].$file->thumbnail ?>">
    <?php } ?>

    <?= $form->field($node, 'file')->fileInput() ?>

     
  </div>
</div>

<div class="row">
  <div class="col-sm-12">

  <?= $form->field($node, 'meta_tag_title')->textarea(['rows' => 2, 'value' => $categoryKeywords->meta_tag_title??''])  ?>
  <?= $form->field($node, 'meta_tag_keywords')->textarea(['rows' => 2, 'value' => $categoryKeywords->meta_tag_keywords??''])  ?>
  <?= $form->field($node, 'meta_tag_description')->textarea(['rows' => 2, 'value' => $categoryKeywords->meta_tag_description??''])  ?>
  
   
  </div>
</div>
