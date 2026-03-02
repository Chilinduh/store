<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{

    public $sourcePath = '@common/web';
    public $js = [

//        'js/vendor/jquery/jquery.js',
        'js/vendor/babel-external-helpers/babel-external-helpers.js',

        'js/vendor/jquery/jquery.js',
        'js/vendor/popper-js/umd/popper.min.js',
        'js/vendor/bootstrap/bootstrap.js',
        'js/vendor/animsition/animsition.js',
        'js/vendor/mousewheel/jquery.mousewheel.js',
        'js/vendor/asscrollbar/jquery-asScrollbar.js',
        'js/vendor/asscrollable/jquery-asScrollable.js',
        'js/vendor/ashoverscroll/jquery-asHoverScroll.js',
//         'js/dashboard/v1.js',

        'js/vendor/switchery/switchery.js',
        'js/vendor/intro-js/intro.js',
        'js/vendor/screenfull/screenfull.js',
        'js/vendor/slidepanel/jquery-slidePanel.js',
        'js/vendor/skycons/skycons.js',
//        'js/vendor/chartist/chartist.min.js',
//        'js/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.js',
        'js/vendor/aspieprogress/jquery-asPieProgress.min.js',
        'js/vendor/jvectormap/jquery-jvectormap.min.js',
        'js/vendor/jvectormap/maps/jquery-jvectormap-au-mill-en.js',
        'js/vendor/matchheight/jquery.matchHeight-min.js',

        'js/Component.js',
        'js/Plugin.js',
        'js/Base.js',
        'js/Config.js',

        'js/Section/Menubar.js',
        'js/Section/GridMenu.js',
        'js/Section/Sidebar.js',
        'js/Section/PageAside.js',
        'js/menu.js',
//        'js/skintools.js',

        'js/config/colors.js',
        'js/config/tour.js',

        'js/Site.js',
        'js/Plugin/asscrollable.js',
        'js/Plugin/slidepanel.js',
        'js/Plugin/switchery.js',
        'js/Plugin/matchheight.js',
        'js/Plugin/jvectormap.js',

        'js/dashboard/v1.js',
//        'js/app.controller.js',

//        'js/vendor/breakpoints/breakpoints.js'

    ];

    public $css = [
        'css/bootstrap.min.css',
        'css/bootstrap-extend.min.css',
        'css/site.min.css',
        'css/uikit/modals.css',
        'js/vendor/animsition/animsition.css',
        'js/vendor/asscrollable/asScrollable.css',
        'js/vendor/switchery/switchery.css',
        'js/vendor/intro-js/introjs.css',
        'js/vendor/slidepanel/slidePanel.css',
        'js/vendor/flag-icon-css/flag-icon.css',
        'js/vendor/chartist/chartist.css',
        'js/vendor/jvectormap/jquery-jvectormap.css',
        'js/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css',
        'css/dashboard/v1.css',
        'fonts/weather-icons/weather-icons.css',
        'fonts/web-icons/web-icons.min.css',
        'fonts/brand-icons/brand-icons.min.css',
        'css/uikit/buttons.css',
        'css/custom.css'
    ];

    //     <link rel="stylesheet"	href="',
    //     <link href=""	rel="stylesheet',
    //     <link href="" rel="stylesheet" type="text/css"	media="all',
    //     <link rel="stylesheet" href="',
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
//         'yii\web\YiiAsset',
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
