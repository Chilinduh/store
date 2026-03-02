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
use backend\assets\FormsAsset;

/**
 * Class Panel
 * @package infinitiweb\widgets\yii2\panel
 */
class FormWidget extends Widget
{

    public $type = '';
    public $id = '';
    public $data = '';
    public $label = false;
    public $post = '';
    public $form_class = false;
    public $action = '';
    public $method = '';

    public function init() {

        FormsAsset::register( $this->getView() );

        echo '<form '.($this->form_class ? 'class="'.$this->form_class.'"' : 'form-horizontal' ).' id="form-'.$this->id.'"
                     action="'.($this->action != '' ? $this->action : Url::to()).'"
                     method="'.($this->method != '' ? $this->method : 'POST').'"
                     '.($this->type != '' ? 'enctype="'.$this->type.'"' : '').'>';

//        echo '<input type="hidden" name="_csrf-backend" value="qxM9poV06X9XepvqxL_ZtUXo0UMbCVPuPBCOz0gKY-rpSUr83UyINTEK8Nu2juDTPIeiBjZcAdwEVtG1KUMkxw==">';
        parent::init();
    }

    public function run() {

        echo '</form>';
    }

    public function text($model, $name, $options = []) {

        echo $this->render('form/text', [
            'model'=>$model,
            'name'=>$name,
            'label'=>$this->label,
            'options'=>$options
        ]);

    }

    public function color($model, $name, $options = []) {

        echo $this->render('form/color', [
            'model'=>$model,
            'name'=>$name,
            'label'=>$this->label,
            'options'=>$options
        ]);

    }

    public function textarea($model, $name, $options = []) {

        echo $this->render('form/textarea', [
            'model'=>$model,
            'name'=>$name,
            'label'=>$this->label,
            'options'=>$options
        ]);

    }

    public function datetime($model, $name, $options = []) {
        $view = $this->getView();

        echo $this->render('form/datetime', [
            'model'=>$model,
            'name'=>$name,
            'label'=>$this->label,
            'options'=>$options
        ]);

        $view->registerJs("(function () {
            var datetime = $('#".Html::getInputId($model, $name)."').datepicker('setDate', '".$model->{$name}."');
            datetime.val('".\Yii::$app->formatter->asDate($model->{$name}, 'dd.MM.yyyy')."');

        })();", View::POS_END);

    }

    public function checkbox($model, $name, $options = []) {

        $view = $this->getView();
        echo $this->render('form/checkbox', [
            'model'=>$model,
            'name'=>$name,
            'label'=>$this->label,
            'options'=>$options
        ]);

        if(isset($options['submit'])) {

            $view->registerJs("(function () {

                $('#".(Html::getInputId($model, $name).'-'.$model->id)."').click(function(){
                    $('#form-".$this->id."').submit();
                });

            })();", View::POS_END);

        }

    }

    public function select($model, $name, $options = []) {

        $view = $this->getView();

        $type = $options['type'] ? $options['type'] : 'select';
        $field = $options['field'] ? $options['field'] : 'id';

        $params = [
                    'model'=>$model,
                    'name'=>$name,
                    'select'=>$options['select'],
                    'field'=>$field,
                    'label'=>$this->label,
                    'options'=>$options
                ];

        switch($type) {

            case 'select':
                echo $this->render('form/select', $params);
                break;

            case 'select2':
                echo $this->render('form/select2', $params);
                $view->registerJs("(function () {
                   var select = $('#".Html::getInputId($model, $name)."').select2({
                            placeholder:\"Select a State\",
//                            noneSelectedText: \"Insert Placeholder text\",
                            allowClear: true,
                        });
                        var item = ".(!$model->isNewRecord ? $model[$name] : "''")."

                        select.val(item).trigger('change');
                })();", View::POS_END);
                break;
        }

    }

    public function cropper($model, $name, $options = []) {

        echo $this->render('form/cropper', [
            'model'=>$model,
            'name'=>$name,
            'options'=>$options
        ]);

    }

    public function fileUpload($model, $name, $options = []) {

        $view = $this->getView();

        echo $this->render('form/fileUpload', [
            'model'=>$model,
            'name'=>$name,
            'label'=>$this->label,
            'options'=>$options
        ]);

//        $view->registerJs("(function () {
//            var colorPicker = $('#colorpicker-".Html::getInputId($model, $name)."').clockpicker();
//            colorPicker.val('".\Yii::$app->formatter->asDate($model->{$name}, 'H:mm')."');
//        })();", View::POS_END);

    }

    public function clockPicker($model, $name, $options = []) {

        $view = $this->getView();

        echo $this->render('form/clockPicker', [
            'model'=>$model,
            'name'=>$name,
            'label'=>$this->label,
            'options'=>$options
        ]);

        $view->registerJs("(function () {
                var colorPicker = $('#colorpicker-".Html::getInputId($model, $name)."').clockpicker();
                colorPicker.val('".\Yii::$app->formatter->asDate($model->{$name}, 'H:mm')."');
            })();", View::POS_END);

    }

}

?>


