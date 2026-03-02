<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 18.09.19
 * Time: 19:12
 */


namespace backend\controllers;

use Yii;
use yii\imagine\Image;
use Imagine\Image\Box;
use yii\web\Controller;
use common\models\Files;

class FilesController extends Controller {

    public function actions() {
        return [
//            'error' => [
//                'class' => 'yii\web\ErrorAction',
//            ],
//            'captcha' => [
//                'class' => 'yii\captcha\CaptchaAction',
//                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
//            ],
        ];
    }

    public function actionUpdate($id) {

        $file = new Files();
        $file = $file->find()->where(['id' => $id])->one();
        if ($file) {

            $file->load(['Files'=>Yii::$app->request->post()]);
            $file->save();
        }
        Yii::$app->getResponse()->setStatusCode(204);
    }
}
