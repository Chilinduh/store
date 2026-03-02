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
class FormsAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [

        '/js/vendor/select2/select2.css',
        '/js/vendor/bootstrap-tokenfield/bootstrap-tokenfield.css',
        '/js/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css',
        '/js/vendor/bootstrap-select/bootstrap-select.css',
        '/js/vendor/icheck/icheck.css',
        '/js/vendor/switchery/switchery.css',
        '/js/vendor/asrange/asRange.css',
        '/js/vendor/ionrangeslider/ionrangeslider.min.css',
        '/js/vendor/asspinner/asSpinner.css',
        '/js/vendor/clockpicker/clockpicker.css',
        '/js/vendor/ascolorpicker/asColorPicker.css',
        '/js/vendor/bootstrap-touchspin/bootstrap-touchspin.css',
        '/js/vendor/jquery-labelauty/jquery-labelauty.css',
        '/js/vendor/bootstrap-datepicker/bootstrap-datepicker.css',
        '/js/vendor/bootstrap-maxlength/bootstrap-maxlength.css',
        '/js/vendor/timepicker/jquery-timepicker.css',
        '/js/vendor/jquery-strength/jquery-strength.css',
        '/js/vendor/multi-select/multi-select.css',
        '/js/vendor/typeahead-js/typeahead.css',
        '/js/vendor/clockpicker/clockpicker.css',
        '/js/vendor/ascolorpicker/asColorPicker.css',

        //<link rel="stylesheet" href="../../assets/examples/css/forms/advanced.css',

    ];

    public $js = [
        
        '/js/vendor/select2/select2.full.min.js',
        '/js/vendor/bootstrap-tokenfield/bootstrap-tokenfield.min.js',
        '/js/vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js',
        '/js/vendor/bootstrap-select/bootstrap-select.js',
        '/js/vendor/icheck/icheck.min.js',
        '/js/vendor/switchery/switchery.js',
        '/js/vendor/asrange/jquery-asRange.min.js',
        '/js/vendor/ionrangeslider/ion.rangeSlider.min.js',
        '/js/vendor/asspinner/jquery-asSpinner.min.js',
        '/js/vendor/clockpicker/bootstrap-clockpicker.min.js',
        '/js/vendor/ascolor/jquery-asColor.min.js',
        '/js/vendor/asgradient/jquery-asGradient.min.js',
        '/js/vendor/ascolorpicker/jquery-asColorPicker.min.js',
        '/js/vendor/bootstrap-maxlength/bootstrap-maxlength.js',
        '/js/vendor/jquery-knob/jquery.knob.js',
        '/js/vendor/bootstrap-touchspin/bootstrap-touchspin.min.js',
        '/js/vendor/jquery-labelauty/jquery-labelauty.js',
        '/js/vendor/bootstrap-datepicker/bootstrap-datepicker.js',
        '/js/vendor/timepicker/jquery.timepicker.min.js',
        '/js/vendor/datepair/datepair.min.js',
        '/js/vendor/datepair/jquery.datepair.min.js',
        '/js/vendor/jquery-strength/password_strength.js',
        '/js/vendor/jquery-strength/jquery-strength.min.js',
        '/js/vendor/multi-select/jquery.multi-select.js',
        '/js/vendor/typeahead-js/bloodhound.min.js',
        '/js/vendor/typeahead-js/typeahead.jquery.min.js',
        '/js/vendor/jquery-placeholder/jquery.placeholder.js',
        
        '/js/Plugin/select2.js',
        '/js/Plugin/bootstrap-tokenfield.js',
        '/js/Plugin/bootstrap-tagsinput.js',
        '/js/Plugin/bootstrap-select.js',
        '/js/Plugin/icheck.js',
        '/js/Plugin/switchery.js',
        '/js/Plugin/asrange.js',
        '/js/Plugin/ionrangeslider.js',
        '/js/Plugin/asspinner.js',
        '/js/Plugin/clockpicker.js',
        '/js/Plugin/ascolorpicker.js',
        '/js/Plugin/bootstrap-maxlength.js',
        '/js/Plugin/jquery-knob.js',
        '/js/Plugin/bootstrap-touchspin.js',
        '/js/Plugin/card.js',
        '/js/Plugin/jquery-labelauty.js',
        '/js/Plugin/bootstrap-datepicker.js',
        '/js/Plugin/jt-timepicker.js',
        '/js/Plugin/datepair.js',
        '/js/Plugin/jquery-strength.js',
        '/js/Plugin/multi-select.js',
        '/js/Plugin/jquery-placeholder.js',
        '/js/Plugin/input-group-file.js',

//        '/js/forms/advanced.js',
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