<!---->
<?php //if($panel) { ?>
<!--<div class="panel">-->
<!-- --><?php //if($heading) { ?>
<!--    <header class="panel-heading">-->
<!--        <h3 class="panel-title">-->
<!--            --><?//= $title; ?>
<!--        </h3>-->
<!--    </header>-->
<!-- --><?php //} ?>
<!--    <div class="panel-body">-->
<?php //} ?>
<!--        -->
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4 pull-center">
                <?= $pagination ?>
            </div>
            
            <div class="col-md-4">
                <?php if($actions) { ?>
                <div class="panel-actions">
                    <?= \yii\helpers\Html::a('<i class="icon wb-plus" aria-hidden="true"></i>', Yii::$app->getUrlManager()->createUrl([Yii::$app->controller->id.'/create']),
                        ['class' => 'btn btn-sm btn-icon btn-flat btn-default update',
                            'title' => Yii::t('yii', 'Редактировать'),
                            'data-pjax' => '0']) ?>
                    <a class="panel-action icon wb-reply" data-toggle="tooltip" data-original-title="send" data-container="body" title=""></a>
                    <a class="panel-action icon wb-trash" data-toggle="tooltip" data-original-title="move to trash" data-container="body" title=""></a>
                    <a class="panel-action icon wb-user" data-toggle="tooltip" data-original-title="uesrs" data-container="body" title=""></a>
                    <a class="panel-action icon wb-refresh" data-toggle="panel-refresh" data-load-type="round-circle" data-load-callback="customRefreshCallback" aria-hidden="true"></a>
                    <a class="panel-action icon wb-expand" data-toggle="panel-fullscreen" aria-hidden="true"></a>
                </div>
                <?php } ?>
            </div>
            

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover dataTable table-striped" style="width:100%" id="exampleFixedHeader">
                        <thead>
                            <tr>
                                <?php foreach($labels as $label) { ?>
                                    <th class="align-middle text-center">
                                        <?php
                                        if($model->getAttributeLabel($label)) {
                                            echo $model->getAttributeLabel($label);
                                        } else {
                                            echo $label;
                                        }
                                        ?>
                                    </th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <?php foreach($labels as $label) { ?>
                                    <th class="align-middle text-center">
                                        <?php
                                        if(!is_array($label) && $model->getAttributeLabel($label)) {
                                            echo $model->getAttributeLabel($label);
                                        } else {
                                        }
                                        ?>
                                    </th>
                                <?php } ?>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach($data as $item) { ?>
                            <tr>
                                <?php foreach($columns as $column) {    ?>
                                    <td class="align-middle text-center">
                                        <?php  
                                        if(is_callable($column)) {
                                           
                                            echo $column($item);
                                           
                                        } else if($model->hasAttribute($column)) {
                                            
                                          
                                           
                                            echo $item->{$column};
                                        }
                                        ?>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php }  ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4">
                Всего: <?= $count; ;?>
            </div>
            <div class="col-md-4 pull-center">
                <?= $pagination ?>
            </div>
            <div class="col-md-4">

            </div>
        </div>
<!--         --><?php //if($panel) { ?>
<!--    </div>-->
<!--</div>-->
<!--         --><?php //} ?>


