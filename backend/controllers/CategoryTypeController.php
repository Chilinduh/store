<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\CategoryType;
use yii\data\ActiveDataProvider;

class CategoryTypeController extends Controller
{
//    public $view = 'catalog';
//
//    public function getViewPath() {
//
//        return Yii::getAlias('@backend/views/catalog');
//    }
//    
    
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */

    public function actionIndex() {
        
        $model = new CategoryType();
        $query = CategoryType::find();
        $data = $query->select('*');

        return $this->render('index',[
            'data'=> $data,
            'model'=> $model,
            'filter' => $model
        ]);
    }


}
