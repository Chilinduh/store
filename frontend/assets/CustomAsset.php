<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 08.10.19
 * Time: 17:49
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class CustomAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'js/ss_custom.js',

    ];

    public $css = [
    ];


    public $depends = [

    ];

    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];

    public $cssOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];

    public $publishOptions = [
        'forceCopy' => true
    ];
}
