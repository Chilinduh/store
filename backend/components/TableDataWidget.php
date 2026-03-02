<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 03.07.19
 * Time: 16:26
 */

namespace app\components;

use Yii;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use backend\assets\TableAsset;

use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
/**
 * Class Panel
 * @package infinitiweb\widgets\yii2\panel
 */
class TableDataWidget extends Widget
{

    public $message = '';
    public $model = '';
    public $filter = '';
    public $labels = '';
    public $columns = '';
    public $title = '';
    public $data = '';
    public $pagination = '';
    public $count = 0;
    public $page = 1;
    public $perPage= 20;
    public $order = false;
    public $panel = true;
    public $heading = false;
    public $actions = true;

//    public $columnHeaders = '';
//    public $searchFilter = '';
//    public $pagination = '';

    public function init() {

        TableAsset::register( $this->getView() );
        parent::init();
    }

    public function run() {

        if(Yii::$app->request->get('page')) {
            $this->page = Yii::$app->request->get('page');
        } else {

        }

        $this->count = $this->data->count();

        $this->data->limit($this->perPage)->offset($this->perPage*(($this->page - 1) ? $this->page-1 : 0 ));

        if($this->order) {
            $this->data->orderBy($this->order);
        } else {
            $this->data->orderBy(['id'=>SORT_ASC]);
        }

        $this->data = $this->data->all();

        return $this->render('table', [
            'data'=>$this->data,
            'model'=>$this->model,
            'filter'=>$this->filter,
            'columns'=>$this->columns,
            'labels'=>$this->labels,
            'count' => $this->count,
            'title'=>$this->title,
            'pagination' => $this->pagination ? $this->pages() : false,
            'panel'=>$this->panel,
            'heading'=>$this->heading,
            'actions'=>$this->actions,
        ]);

    }

    public function pages() {

        return $this->render('pagination', [
            'url' => Yii::$app->controller->id,
            'count' => round($this->count%$this->perPage),
            'page' => $this->page,
        ]);
    }

}

?>


