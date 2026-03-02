<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 03.06.19
 * Time: 16:10
 */

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;


class HeaderMenuWidget extends Widget
{
    public $message;
    public $model;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'Hello World';
        }

//        $this->model = Pets::Pets();
    }

    public function run()
    {
        //         return Html::encode($this->message);

        return $this->render('headerMenu', ['model'=>$this->model]);

    }
}
