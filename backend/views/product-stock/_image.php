<?php

use common\models\Files;

$file = Files::find()->where(['table_id' => $node->id, 'table_name' => 'tree'])->one();

?>

<div class="row">
  <div class="col-sm-8">

    <?php if ($file) { ?>
      <img src="<?= Yii::$app->params['imageUrl'].$file->thumbnail ?>">
    <?php } ?>

    <?= $form->field($node, 'file')->fileInput() ?>
  </div>
</div>
