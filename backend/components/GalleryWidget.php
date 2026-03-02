<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 18.07.19
 * Time: 16:26
 */

namespace app\components;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use backend\assets\GalleryAsset;

/**
 * Class Panel
 * @package infinitiweb\widgets\yii2\panel
 */

class GalleryWidget extends Widget {

    public $type = '';
    public $id = '';
    public $data = '';
    public $images = '';
    public $width = false;

    public function init() {

        GalleryAsset::register( $this->getView() );
        parent::init();
    }

    public function run() {

//    $view = $this->getView();

        echo $this->render('gallery/gallery', [
            'images' => $this->images,
            'width' => $this->width ? $this->width : false
//        'name'=>$name,
//        'options'=>$options
        ]);
//
//    $view->registerJs("(function () {
//            var colorPicker = $('#colorpicker-".Html::getInputId($model, $name)."').clockpicker();
//            colorPicker.val('".\Yii::$app->formatter->asDate($model->{$name}, 'H:mm')."');
//        })();", View::POS_END);

    }

}

?>