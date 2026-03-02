<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 09.10.19
 * Time: 16:02
 */


namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Products;
use yii\data\ActiveDataProvider;
use common\models\DeliveryTypes;

class DeliveryTypesController extends Controller {


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

        $model = new DeliveryTypes();
        $model = $model->find()->where(['id' => $id])->one();

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
//            $model = new Products(); //reset model
        }

        return $this->render('_form', [
            'model' => $model
        ]);
    }

    public function actionCreate() {

        $model = new DeliveryTypes();

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {

        }

        return $this->render('_form', [
            'model' => $model
        ]);
    }

    public function actionIndex()
    {

        $model = new DeliveryTypes();
        $query = DeliveryTypes::find();
        $data = $query;

        return $this->render('index',[
            'data'=> $data,
            'model'=> $model,
            'filter' => $model
        ]);
    }

    public function actionDelete($id) {

        $model = new PaymentTypes();
        $model = $model->find()->where(['id' => $id])->one();

        if ($model) {
            $model->delete(false);
        }

        return $this->redirect('/index');
    }

}
