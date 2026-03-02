<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\Ingredients;

class IngredientsController extends Controller {
    
    
    public function actions() {
        
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
        
        $model = new Ingredients();
        $model = $model->find()->where(['id' => $id])->one();

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
//            $model = new Products(); //reset model
        }

        return $this->render('_form', [
            'model' => $model
        ]);
    }
    
    public function actionCreate() {
        
        $model = new Manufacturers();

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
//            $model = new Products(); //reset model
        }

        return $this->render('_form', [
            'model' => $model
        ]);
    }
    
    public function actionIndex() {
        
        $model = new Ingredients();
        $query = Ingredients::find();
        $data = $query;

        return $this->render('index',[
            'data'=> $data,
            'model'=> $model,
            'filter' => $model
        ]);
    }

    public function actionDelete($id) {

        $model = new Ingredients();
        $model = $model->find()->where(['id' => $id])->one();

        if ($model) {
            $model->delete(false);
        }

        return $this->redirect('delete');
    }
  
}
