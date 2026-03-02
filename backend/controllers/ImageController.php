<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 29.07.19
 * Time: 15:15
 */

namespace backend\controllers;

use Yii;
use yii\imagine\Image;
use Imagine\Image\Box;
use yii\web\Controller;
use common\models\User;
use common\models\Images;

class ImageController extends Controller {

    public $view = 'image';

    public function getViewPath() {
        
        return Yii::getAlias('@backend/views/image');
    }


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
//        
//        $user = new User();
//        $images = new Images();
//        $user = $user->find()->where(['id' => $id])->one();
//
//        if ($id && $user->load(Yii::$app->request->post())) {
//
//            $user->save(false);
//            $images = $images->find()->where(['table_name' => 'user', 'table_id' => $user->id]);
//
//            if($_FILES) {
//
//                $path_parts = pathinfo($_FILES['User']['name']['file']);
//
//                if($images = $images->one()) {
//
//                } else {
//
//                    $images->size = 'thumbnail';
//                    $images->table_name = 'user';
//                    $images->table_id = $user->id;
//                }
//
//                $path = \Yii::getAlias('@userImages').'/'.$user->id.'.'.$path_parts['extension'];
//                $images->path = strtolower('/images/user/'.$user->id.'.'.$path_parts['extension']);
//
//                Image::resize($_FILES['User']['tmp_name']['file'], 100, 100, 0)->save($path, ['jpeg_quality' => 50]);
//                $images->save(false);
//
//                Image::resize($_FILES['User']['tmp_name']['file'], 100, 100, 0)->save($path, ['jpeg_quality' => 50]);
//                $images->save(false);
//            }
//
//        }
//
//        return $this->render('_form', [
//            'model' => $user,
//            'images' => $images->find()->where(['table_name' => 'user', 'table_id' => $user->id])->all()
//        ]);
    }

    public function actionCreate() {
        
        $images = new Images();
        $images->id = 3;
        $images->table_name = 'user';
        $images->table_id = 2;
        $images->show = 1;
        $images->size = 'thumbnail';
        $images->path = '/images';
        $images->main = 1;
        $images->created_at = 1555754591;
        $images->updated_at = 1555754591;
        
        print_r($images->validate()); die;

        if ($images->load(Yii::$app->request->post()) && $images->save(false)) {
            print_r($_FILES); die;

            $user_id = Yii::$app->user->identity->id;

            $path_parts = pathinfo($_FILES['Image']['name']['file']);
            $path = \Yii::getAlias('@userImages').$user_id.'.'.$path_parts['extension'];
            $images->path = strtolower('/images/user/'.$user_id.'.'.$path_parts['extension']);
            Image::resize($_FILES['Image']['tmp_name']['file'], 100, 100, 0)->save($path, ['jpeg_quality' => 50]);

            $images = new Images(); //reset model

        }

        return $this->render('_form', [
            'model' => $images
        ]);
    }

    public function actionDelete($id) {

        $model = new Images();
        $model = $model->find()->where(['id' => $id])->one();

        if ($model) {
            $model->delete(false);
        }

        return $this->redirect('/');
    }


    public function actionIndex() {

        $model = new Images();
        $query = Images::find();
        $data = $query->select('*');
        
        
        return $this->render('index',[
            'data'=> $data,
            'model'=> $model,
            'filter' => $model
        ]);
    }

}
