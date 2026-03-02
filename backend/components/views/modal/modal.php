<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 29.07.19
 * Time: 17:49
 */
?>


<div class="modal fade modal-primary" id="<?= $id ?>" aria-hidden="true"
     aria-labelledby="<?= $id ?>" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title"><?= $title ?></h4>
            </div>
            <div class="modal-body">
               <?= is_callable($content) ? $content() : $content; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </div>
</div>