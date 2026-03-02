<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AuthAsset;
use backend\assets\AngularAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AuthAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">

    <!--[if lt IE 9]>
    <script src="js/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

    <!--[if lt IE 10]>
    <script src="js/vendor/media-match/media.match.min.js"></script>
    <script src="js//vendor/respond/respond.min.js"></script>
    <script src="js/vendor/breakpoints/breakpoints.js"></script>

    <script>
      Breakpoints();
    </script>

</head>
<body class="animsition page-login-v3 layout-full">

<?php $this->beginBody() ?>

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Page -->
    <div class="page">
      <div class="page-content container-fluid">

      <?= $content ?>

      </div>
    </div>
    <!-- End Page -->




<?php $this->endBody() ?>


</body>

</html>
<?php $this->endPage() ?>
