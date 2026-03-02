<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 07.10.19
 * Time: 13:31
 */

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Products;
use yii\data\ActiveDataProvider;
use common\models\Review;
use yii\widgets\Breadcrumbs;

class ReviewController extends Controller {


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

    public function actionUpdate($id) {

        $model = new Review();
        $data = $model->review();
        $model = $model->find()->where(['id' => $id])->one();

        
        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
//            $model = new Products(); //reset model
        }

        return $this->render('_form', [
            'model' => $model,
            'data' => $data
        ]);
    }

    public function actionCreate() {

        $model = new Review();

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
//            $model = new Products(); //reset model
        }

        return $this->render('_form', [
            'model' => $model
        ]);
    }

    public function actionIndex() {
        
        
        $model = new Review();
        $query = Review::review();
        $data = $query;
        
        

        return $this->render('index',[
            'data'=> $query,
            'model'=> $model,
            'filter' => $model
        ]);
    }

    public function actionDelete($id) {

        $model = new Review();
        $model = $model->find()->where(['id' => $id])->one();

        if ($model) {
            $model->delete(false);
        }

        return $this->redirect('/menu');
    }

}
