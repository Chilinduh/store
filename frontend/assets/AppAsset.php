<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [

        'vendor/bootstrap/js/bootstrap.bundle.min.js',
        'vendor/owl-carousel/owl.carousel.min.js',
        'vendor/nouislider/nouislider.min.js',
        'vendor/photoswipe/photoswipe.min.js',
        'vendor/photoswipe/photoswipe-ui-default.min.js',
        'vendor/select2/js/select2.min.js',

      //'js/gallery.js',
        'js/custom.js',
        'js/number.js',
        'js/main.js',
        'js/favorite.js',

        'js/cart.js',
      'js/modal.js',
    ];

    public $css = [

      'vendor/bootstrap/css/bootstrap.css',
      'vendor/owl-carousel/assets/owl.carousel.min.css',
      'vendor/photoswipe/photoswipe.css',
      'vendor/photoswipe/default-skin/default-skin.css',
      'vendor/select2/css/select2.min.css',
      'css/blue/style.ltr.css',
      'css/custom.css',
      'vendor/fontawesome/css/all.min.css',
    ];

//     <link rel="stylesheet"	href="',
//     <link href=""	rel="stylesheet',
//     <link href="" rel="stylesheet" type="text/css"	media="all',
//     '',
//     <link rel="stylesheet" type="text/css" href="',
//     <link href="css/icon" rel="stylesheet',
//     <link href="" rel="stylesheet" type="text/css"	media="all',
//     <link href="" rel="stylesheet" type="text/css"	media="all',
//     <link href="" rel="stylesheet"	type="text/css" media="all',
//     <link href="" rel="stylesheet"	type="text/css" media="all',
//     <link href="" rel="stylesheet" type="text/css"	media="all',
//     <link href="" rel="stylesheet" type="text/css"	media="all',
//     <link href="" rel="stylesheet" type="text/css"	media="all',
//     <link rel="stylesheet"	href="',


    public $depends = [
        'yii\web\YiiAsset',
//        'frontend\assets\AngularAsset',
//        'yii\bootstrap\BootstrapAsset',

    ];

    public $jsOptions = [
        'position' => \yii\web\View::POS_END
    ];

    public $cssOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];

    public $publishOptions = [
        'forceCopy' => true
    ];
}
