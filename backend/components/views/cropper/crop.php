
<?php

use yii\helpers\Html;
?>


    <div class="cropper text-center" id="<?= $id ?>">
        <img src="" type="file">
    </div>

    <div class="cropper-toolbar">
        <div class="btn-group mb-20">
            <button type="button" class="btn btn-primary" data-cropper-method="zoom" data-option="0.1"
                    data-toggle="tooltip" data-container="body" title="Zoom In">
              <span class="cropper-tooltip" title="zoom in">
                <i class="icon wb-zoom-in"></i>
              </span>
            </button>
            <button type="button" class="btn btn-primary" data-cropper-method="zoom" data-option="-0.1"
                    data-toggle="tooltip" data-container="body" title="Zoom Out">
              <span class="cropper-tooltip" title="zoom out">
                <i class="icon wb-zoom-out"></i>
              </span>
            </button>
            <button type="button" class="btn btn-primary" data-cropper-method="rotate" data-option="-90"
                    data-toggle="tooltip" data-container="body" title="Turn Left">
              <span class="cropper-tooltip" title="rotate left 90°">
                <i class="icon wb-arrow-left cropper-flip-horizontal"></i>
              </span>
            </button>
            <button type="button" class="btn btn-primary" data-cropper-method="rotate" data-option="90"
                    data-toggle="tooltip" data-container="body" title="Turn Right">
              <span class="cropper-tooltip" title="rotate right 90°">
                <i class="icon wb-arrow-right"></i>
              </span>
            </button>
            <button type="button" class="btn btn-primary" data-cropper-method="rotate" data-option="-5"
                    data-toggle="tooltip" data-container="body" title="Rotate Left">
              <span class="cropper-tooltip" title="rotate left 90°">
                <i class="icon wb-refresh cropper-flip-horizontal"></i>
              </span>
            </button>
            <button type="button" class="btn btn-primary" data-cropper-method="rotate" data-option="5"
                    data-toggle="tooltip" data-container="body" title="Rotate Right">
              <span class="cropper-tooltip" title="rotate right 90°">
                <i class="icon wb-reload" aria-hidden="true"></i>
              </span>
            </button>
        </div>

        <div class="btn-group mb-20">
            <button type="button" class="btn btn-primary" data-cropper-method="setDragMode"
                    data-option="move" data-toggle="tooltip" data-container="body"
                    title="Move">
              <span class="cropper-tooltip" title="move">
                <i class="icon wb-move" aria-hidden="true"></i>
              </span>
            </button>
            <button type="button" class="btn btn-primary" data-cropper-method="setDragMode"
                    data-option="crop" data-toggle="tooltip" data-container="body"
                    title="Crop">
              <span class="cropper-tooltip" title="Crop">
                <i class="icon wb-crop" aria-hidden="true"></i>
              </span>
            </button>
            <button type="button" class="btn btn-primary" data-cropper-method="getCroppedCanvas"
                    data-option='{ "width": 320, "height": 180 }' data-toggle="tooltip"
                    data-container="body" title="Get Image">
                  <span class="cropper-tooltip" title="Get Image">
                    <i class="icon wb-image" aria-hidden="true"></i>
                  </span>
            </button>
            <button type="button" class="btn btn-primary" data-cropper-method="clear" data-toggle="tooltip"
                    data-container="body" title="Clear">
                  <span class="cropper-tooltip" title="clear">
                    <i class="icon wb-close" aria-hidden="true"></i>
                  </span>
            </button>
            <label class="btn btn-primary mb-0" data-toggle="tooltip" for="<?= Html::getInputId($model, $name) ?>" data-container="body">
                <input type="file" class="hidden-xs-up"  name="<?= Html::getInputName($model, $name) ?>" id="<?= Html::getInputId($model, $name) ?>" accept="image/*" >
                <input type="text" class="hidden-xs-up"  name="<?= Html::getInputName($model, 'blob') ?>" id="<?= Html::getInputId($model, 'blob') ?>" >
              <span class="cropper-tooltip" title="Import image with FileReader">
                <i class="icon wb-upload" aria-hidden="true"></i>
              </span>
            </label>
        </div>

        <div class="col-lg-4">
            <div class="cropper-data">
                <div class="input-group mb-15">
                    <label class="input-group-prepend" for="inputDataX">
                        <span class="input-group-text">X</span>
                    </label>
                    <input type="number" class="form-control" id="inputDataX" name="inputNumbers" placeholder="x">

                    <label class="input-group-prepend" for="inputDataY">
                        <span class="input-group-text">Y</span>
                    </label>
                    <input type="number" class="form-control" id="inputDataY" name="inputNumbers" placeholder="y">

                    <label class="input-group-prepend" for="inputDataWidth">
                        <span class="input-group-text">Width</span>
                    </label>
                    <input type="number" class="form-control" id="inputDataWidth" name="inputNumbers"
                           placeholder="width">

                    <label class="input-group-prepend" for="inputDataHeight">
                        <span class="input-group-text">Height</span>
                    </label>
                    <input type="number" class="form-control" id="inputDataHeight" name="inputNumbers"
                           placeholder="height">

                </div>
                <button class="btn btn-primary btn-block" id="setCropperData" type="button">Set Data</button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade docs-cropped" id="getDataURLModal" aria-hidden="true" aria-labelledby="getDataURLTitle"
             role="dialog" tabindex="-1">
            <div class="modal-dialog modal-simple">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="getDataURLTitle">Cropped</h4>
                    </div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
    </div>

