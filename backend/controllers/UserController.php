<?php

namespace backend\controllers;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\imagine\Image;
use Imagine\Image\Box;
use yii\web\Controller;
use common\models\User;
use common\models\Images;
use common\models\UserImages;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use common\models\UserProfile;
use Carbon\Carbon;

class UserController extends Controller
{

  public function behaviors()
  {

    return [
      [
        'class' => TimestampBehavior::className(),
        'createdAtAttribute' => 'create_at',
        'updatedAtAttribute' => 'update_at',
        'value' => new Expression('NOW()'),
      ],
    ];
  }

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

  public function actionUpdate($id)
  {

    $user = User::findOne(['id' => $id]);
    $userProfile = $user->getUserProfile()->one();

    if ($user && $user->load(Yii::$app->request->post())) {

      $user->email = $user->username;
      $user->setPassword($user->password);
      $user->generateAuthKey();
      $user->generateEmailVerificationToken();

      if ($user->save()) {

        if($userProfile) {
          $userProfile = new UserProfile();
        }
        $userProfile->first_name = $user->first_name;
        $userProfile->last_name = $user->last_name;
        $userProfile->country = $user->country;
        $userProfile->city = $user->city;
        $userProfile->address = $user->address;
        $userProfile->phone = $user->phone;
        $userProfile->save();
      }

    } else {

      $user->first_name = $userProfile->first_name;
      $user->last_name = $userProfile->last_name;
      $user->country = $userProfile->country;
      $user->city = $userProfile->city;
      $user->address = $userProfile->address;
      $user->phone = $userProfile->phone;
      $user->save();
    }

//        if($id && $_FILES) {
//
//            foreach($user->getImages() as $image) {
//                $image->delete();
//            }
//            $path = \Yii::getAlias('@userImages').'/'.$user->id;
//            $path_to_save = '/images/users/'.$user->id;
//            $file_path = $_FILES['User']['tmp_name']['file'];
//
//            $images = new Images();
//            $images->saveImages([
//                'file_name' => 'User[file]',
//                'file_path' => $file_path,
//                'table_name' => 'user',
//                'table_id' => $user->id,
//                'path' => $path,
//                'path_to_save' => $path_to_save,
//                'width' => 100,
//                'height' => 100,
//                'size'=> Images::THUMBNAIL
//            ]);
//            $images = new Images();
//            $images->saveImages([
//                'table_name' => 'user',
//                'table_id' => $user->id,
//                'file_name' => 'User[file]',
//                'file_path' => $_FILES['User']['tmp_name']['file'],
//                'path' => $path,
//                'path_to_save' => $path_to_save,
//            ]);
//        }

    return $this->render('_form', [
      'model' => $user,
    ]);
  }

  public function actionCreate()
  {

    $user = new User();

    if ($user->load(Yii::$app->request->post())) {

      $user->email = $user->username;
      $user->setPassword($user->password);
      $user->generateAuthKey();
      $user->generateEmailVerificationToken();

      if ($user->save()) {

        $userProfile = new UserProfile();
        $userProfile->first_name = $user->first_name;
        $userProfile->last_name = $user->last_name;
        $userProfile->country = $user->country;
        $userProfile->city = $user->city;
        $userProfile->address = $user->address;
        $userProfile->phone = $user->phone;
        $userProfile->save();
      }

    }

//        if ($user->load(Yii::$app->request->post()) && $user->save(false)) {
//
//            $images->size = 'thumbnail';
//            $images->table_name = 'user';
//            $images->table_id = $user->id;
//
//            $path_parts = pathinfo($_FILES['User']['name']['file']);
//            $path = \Yii::getAlias('@userImages').$user->id.'.'.$path_parts['extension'];
//            $images->path = strtolower('/images/user/'.$user->id.'.'.$path_parts['extension']);
//            Image::resize($_FILES['User']['tmp_name']['file'], 100, 100, 0)->save($path, ['jpeg_quality' => 50]);
//
//            $model = new User(); //reset model
//        }

    return $this->render('_form', [
      'model' => $user,
    ]);
  }

  public function actionDelete($id)
  {

    $model = new User();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model) {

      $model->deleted_at  = Carbon::now()->format('Y-m-d H:i:s');
      $model->save(false);
    }

    return $this->redirect('/user');
  }

  public function actionIndex()
  {


    $searchModel = new User();
    $query = $searchModel->find();

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
      'pagination' => [
        'pageSize' => 15
      ]
    ]);

    return $this->render('index', [
      'dataProvider' => $dataProvider,
      'searchModel' => $searchModel,
    ]);
  }

}


//            Image::resize($images->file->tempName, $size[0], $size[1])->save($path . $images->id . '.jpg' , ['jpeg_quality' => 50]);
//            $images->save();
//            Image::resize($images->file->tempName, $size[0], $size[1])->save($path . $images->id . '.jpg' , ['jpeg_quality' => 50]);
//            move_uploaded_file($_FILES['User']['tmp_name']['file'], $path . $images->id.'.'.$images->file->extension);

//            Image::resize($images->path, 100, 100)->save($path . $images->id . '.jpg' , ['jpeg_quality' => 50]);

//            print_r($images->file);die;
//            copy($_FILES['User']['tmp_name']['file'], $images->path);


//            $image, $width, $height, $keepAspectRatio = true, $allowUpscaling = false

//            Image::resize($_FILES['User']['tmp_name']['file'], $size[0], $size[1])->save($path . $images->id . '.jpg' , ['jpeg_quality' => 50]);

//                $images->file->value = $_FILES['User']['tmp_name']['file']; // из документации
//$images->save();
//$images->file->saveAs($path . $images->id.'.'.$images->file->extension);

//            $images->save(false);
