<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class AngularAsset extends AssetBundle
{
    public $sourcePath = '@bower';
    
 
    public $css = [
        'angular/angular-csp.css',
    ];
    public $js = [
        'angular/angular.min.js',
    ];
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}