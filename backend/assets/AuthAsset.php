<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AuthAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [

        //'js/vendor/jquery/jquery.js',
//        'js/vendor/babel-external-helpers/babel-external-helpers.js',
//        'js/vendor/popper-js/umd/popper.min.js',
//        'js/vendor/bootstrap/bootstrap.js',
//        'js/vendor/animsition/animsition.js',
//        'js/vendor/mousewheel/jquery.mousewheel.js',
//        'js/vendor/asscrollbar/jquery-asScrollbar.js',
//        'js/vendor/asscrollable/jquery-asScrollable.js',
//        'js/vendor/ashoverscroll/jquery-asHoverScroll.js',
//         'js/dashboard/v1.js',

//        'js/vendor/switchery/switchery.js',
//        'js/vendor/intro-js/intro.js',
//        'js/vendor/screenfull/screenfull.js',
//        'js/vendor/slidepanel/jquery-slidePanel.js',
//        'js/vendor/jquery-placeholder/jquery.placeholder.js',
//
//        'js/Component.js',
//        'js/Plugin.js',
//        'js/Base.js',
//        'js/Config.js',
//

//        'js/Section/Menubar.js',
//        'js/Section/GridMenu.js',
//        'js/Section/Sidebar.js',
//        'js/Section/PageAside.js',
//        'js/menu.js',
//
//        'js/config/colors.js',
//        'js/config/tour.js',
//
//        'js/Site.js',
//        'js/Plugin/asscrollable.js',
//        'js/Plugin/slidepanel.js',
//        'js/Plugin/switchery.js',
//
//        'js/Plugin/jquery-placeholder.js',
//        'js/Plugin/material.js',

    ];

    public $css = [
      'css/plugins/global/plugins.bundle.css',
      'css/style.bundle.css',
      'css/custom.css',
//    'css/bootstrap.min.css',
//    'css/bootstrap-extend.min.css',
//    'css/site.min.css',
//
//    'js/vendor/animsition/animsition.css',
//    'js/vendor/asscrollable/asScrollable.css',
//    'js/vendor/switchery/switchery.css',
//    'js/vendor/intro-js/introjs.css',
//    'js/vendor/slidepanel/slidePanel.css',
//    'js/vendor/flag-icon-css/flag-icon.css',
//
//    'fonts/web-icons/web-icons.min.css',
//    'fonts/brand-icons/brand-icons.min.css',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
//        'backend\assets\AngularAsset',
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
