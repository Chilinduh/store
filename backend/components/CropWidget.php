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
use backend\assets\CropAsset;

/**
 * Class Panel
 * @package infinitiweb\widgets\yii2\panel
 */

class CropWidget extends Widget {

    public $type = '';
    public $id = 'cropper';
    public $data = '';
    public $name = '';
    public $model = '';

    public function init() {

        CropAsset::register( $this->getView() );
        parent::init();
    }

    public function crop() {

        $view = $this->getView();

        echo $this->render('cropper/crop', [

            'model'=>$this->model,
            'name'=>$this->name,
            'id'=>$this->id,
//        'options'=>$options
        ]);
//
        $view->registerJs("(function () {
        
 
  var exampleFullCropper = $('#".$this->id." img'),
        inputDataX = $('#inputDataX'),
        inputDataY = $('#inputDataY'),
        inputDataHeight = $('#inputDataHeight'),
        inputDataWidth = $('#inputDataWidth');
    
    var options = {
        checkCrossOrigin: false,
        cropmove: function() {


        },
//      aspectRatio: 16 / 9,
            preview: '#exampleFullCropperPreview > .img-preview',
      responsive: true,
      
      crop: function crop() {
        var data = $(this).data('cropper').getCropBoxData();
        inputDataX.val(Math.round(data.left));
        inputDataY.val(Math.round(data.top));
        inputDataHeight.val(Math.round(data.height));
        inputDataWidth.val(Math.round(data.width));
      }
    }; // set up cropper

    exampleFullCropper.cropper(options); // set up method buttons
    var inputImage = $('#".Html::getInputId($this->model, $this->name)."');
    var inputBlob = $('#".Html::getInputId($this->model, 'blob')."');

    $(document).on('click', '[data-cropper-method]', function () {

      var data = $(this).data(),
      method = $(this).data('cropper-method'),
      result;

      console.log('dsfdsfsfsf', method, data.option);

      if (method) {
          result = exampleFullCropper.cropper(method, data.option);
      };

      console.log('dsfdsfsfsf', method, result);

      inputBlob.val(result.toDataURL('image/jpeg'))

      if (method === 'getCroppedCanvas') {
          //$('#getDataURLModal').modal().find('.modal-body').html(result);
      }
    }); // deal wtih uploading

    if (window.FileReader) {

        inputImage.change(function () {

            var fileReader = new FileReader(),
            files = this.files,
            file;

        if (!files.length) {
            return;
        }

        file = files[0];

        console.log('file',file);
   
        if (/^image\/\w+$/.test(file.type)) {
                fileReader.readAsDataURL(file);
                fileReader.onload = function () {
                    exampleFullCropper.cropper('reset', true).cropper('replace', this.result);
//                    inputImage.val(this.result);

                };
            } else {
                showMessage('Please choose an image file.');
            }
      });
      

    } else {
        inputImage.addClass('hide');
    } // set data


    $('#setCropperData').click(function () {
      var data = {
        left: parseInt(inputDataX.val()),
        top: parseInt(inputDataY.val()),
        width: parseInt(inputDataWidth.val()),
        height: parseInt(inputDataHeight.val())
      };

      exampleFullCropper.cropper('setCropBoxData', data);
    });
        })();", View::POS_END);

    }

}

?>