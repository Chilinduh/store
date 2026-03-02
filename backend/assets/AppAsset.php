<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{

    public $basePath = '@backend';
    public $baseUrl = '@web';

    public $js = [

        'js/leaflet/leaflet-src.js',
//        'js/custom/apps/ecommerce/catalog/products.js',
//        'js/plugins/custom/datatables/datatables.bundle.js',
    ];

    public $css = [
        'css/style.bundle.css',
        'js/leaflet/leaflet.css',
//        'css/bootstrap.min.css',
//        'css/bootstrap-extend.min.css',
//        'css/site.min.css',
//        'css/uikit/modals.css',
//        'js/vendor/animsition/animsition.css',
//        'js/vendor/asscrollable/asScrollable.css',
//        'js/vendor/switchery/switchery.css',
//        'js/vendor/intro-js/introjs.css',
//        'js/vendor/slidepanel/slidePanel.css',
//        'js/vendor/flag-icon-css/flag-icon.css',
//        'js/vendor/chartist/chartist.css',
//        'js/vendor/jvectormap/jquery-jvectormap.css',
//        'js/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css',
//        'css/dashboard/v1.css',
//        'fonts/weather-icons/weather-icons.css',
//        'fonts/web-icons/web-icons.min.css',
//        'fonts/brand-icons/brand-icons.min.css',
//        'css/uikit/buttons.css',
        'css/custom.css',
        'css/fontawesome/css/fontawesome.css',
        'css/fontawesome/css/brands.css',
        'css/fontawesome/css/solid.css',
        'js/plugins/custom/datatables/datatables.bundle.css'
    ];

    public $depends = [
         //'yii\web\YiiAsset',
//         'yii\bootstrap\BootstrapAsset',
//         'frontend\assets\AngularAsset',
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
