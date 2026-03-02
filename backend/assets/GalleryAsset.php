<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class GalleryAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        
        
        '/js/vendor/magnific-popup/magnific-popup.css',
        '/css/pages/gallery.css',
        

    ];

    public $js = [
    
        //<script src="../../assets/examples/js/pages/gallery.js"></script>
        
        '/js/vendor/isotope/isotope.pkgd.min.js',
        '/js/vendor/magnific-popup/jquery.magnific-popup.min.js',
        '/js/Plugin/filterable.js',

        '/js/pages/gallery.js',
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

    public $depends = [
         'backend\assets\AppAsset',
    ];
}