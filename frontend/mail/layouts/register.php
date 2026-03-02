<?php

use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>"/>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
  <style>

    .order th, td {
      border: 1px solid black;
      padding: 5px;
    }

    .order td {
      padding: 15px;
      text-align: center;
    }
    .order th {
      text-align: center;
    }

  </style>
</head>
<body>
<?php $this->beginBody() ?>
Здравствуйте. Регистрация в Интерне-магазине <?= $site??'' ?>:

<br><br>
Для завершения регистрации перейдите по <a href="http://<?= $site ?>/verify-email?token=<?= $user->verification_token ?>">ссылке</a>
<br><br>
С Уважением, <?= $site??'' ?><br>
Email: <?= $adminEmail??'' ?><br>
Тел.: <?= $phone??'' ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
