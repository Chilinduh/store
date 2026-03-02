<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 03.06.19
 * Time: 16:10
 */

namespace frontend\components\CatalogFilterHide;

use yii\base\Widget;
use yii\helpers\Html;

class CatalogFilterHideWidget extends Widget
{
    public $model;

    public function init()
    {
        parent::init();
    }

    public function run()
    {

        return $this->render('catalogFilterHide', ['model'=>$this->model]);
    }
}


