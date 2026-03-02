<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Products;
use yii\data\ActiveDataProvider;
use common\models\PaymentTypes;

class PaymentTypesController extends Controller {


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

        $model = new PaymentTypes();
        $model = $model->find()->where(['id' => $id])->one();

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
//            $model = new Products(); //reset model
        }

        return $this->render('_form', [
            'model' => $model
        ]);
    }

    public function actionCreate() {

        $model = new PaymentTypes();

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {

        }

        return $this->render('_form', [
            'model' => $model
        ]);
    }

    public function actionIndex()
    {

        $model = new PaymentTypes();
        $query = PaymentTypes::find();
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
