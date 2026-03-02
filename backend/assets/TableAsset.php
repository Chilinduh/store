<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class TableAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [

        '/js/vendor/datatables.net/jquery.dataTables.js',
        '/js/vendor/datatables.net-bs4/dataTables.bootstrap4.js',
        '/js/vendor/datatables.net-fixedheader/dataTables.fixedHeader.js',
        '/js/vendor/datatables.net-fixedcolumns/dataTables.fixedColumns.js',
        '/js/vendor/datatables.net-rowgroup/dataTables.rowGroup.js',
        '/js/vendor/datatables.net-scroller/dataTables.scroller.js',
        '/js/vendor/datatables.net-responsive/dataTables.responsive.js',
        '/js/vendor/datatables.net-responsive-bs4/responsive.bootstrap4.js',
        '/js/vendor/datatables.net-buttons/dataTables.buttons.js',
        '/js/vendor/datatables.net-buttons/buttons.html5.js',
        '/js/vendor/datatables.net-buttons/buttons.flash.js',
        '/js/vendor/datatables.net-buttons/buttons.print.js',
        '/js/vendor/datatables.net-buttons/buttons.colVis.js',
        '/js/vendor/datatables.net-buttons-bs4/buttons.bootstrap4.js',
        '/js/vendor/asrange/jquery-asRange.min.js',
        '/js/vendor/bootbox/bootbox.js',
        '/js/Plugin/datatables.js',
        '/js/datatable.js'

    ];

    public $css = [
        '/js/vendor/datatables.net-bs4/dataTables.bootstrap4.css',
        '/js/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css',
        '/js/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css',
        '/js/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css',
        '/js/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css',
        '/js/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css',
        '/js/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css',
        '/js/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css',
        //<link rel="stylesheet" href="../../assets/examples/css/tables/datatable.css',
        '/fonts/font-awesome/font-awesome.css'
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
