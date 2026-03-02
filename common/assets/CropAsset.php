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
class CropAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        
        '/js/vendor/cropper/cropper.css',
        '/css/forms/image-cropping.css',
    ];

    public $js = [
    
        '/js/vendor/cropper/cropper.js',
//        '/js/forms/image-cropping.js',
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