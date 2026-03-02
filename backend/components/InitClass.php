<?php 
//namespace backend\controllers;
//
//use Yii;
//use yii\base\Model;
//use commons\models\City;
//use common\models\Settings;
//
//class InitClass extends \yii\base\Component  {
//    
//    $model = new Settings();
//
//    $settings = Settings::find()->where(['user_id' => Yii::$app->user->id])->one();
//    $data = Yii::$app->request->post();
//
//    if($settings && $settings->load($data)) {
//         $model = $settings;
//    } else {
//        $model->load($data);
//    }
//
//    $model->save(false);
//
//    $session = new Session;
//    $session->open();
//    $session->set('settings', $model);
//
//    public function init() {
//    
//        parent::init();
//    }
//}