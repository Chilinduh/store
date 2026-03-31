<?php

namespace frontend\assets;
use yii\web\AssetBundle;

class DesignAsset extends AssetBundle
{

  public $basePath = '@webroot';
  public $baseUrl = '@web';

  public $js = [
  ];

  public $css = [
    'css/design.css',
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
