<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 29.07.19
 * Time: 17:45
 */


namespace app\components;

use yii\base\Widget;
use yii\web\View;

/**
 * Class Panel
 * @package infinitiweb\widgets\yii2\panel
 */

class ModalWidget extends Widget {

    public $title = '';
    public $id = '';
    public $content = '';
    public $modal = '';

    public function init() {

        parent::init();
    }

    public function run() {

//        $view = $this->getView();

        echo $this->render('modal/modal', [
            'id'=> $this->id,
            'content'=>$this->content,
            'title'=> $this->title
        ]);
//

    }

}

?>


