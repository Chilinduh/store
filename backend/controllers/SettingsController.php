<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 12.09.19
 * Time: 19:30
 */

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\City;
use common\models\Settings;
use common\models\Stocks;

use  yii\web\Session;

/**
 * Site controller
 */
class SettingsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors() {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action) {

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
        
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        
        $model = new Settings();
        $stocks = new Stocks();
        
        
        $settings = Settings::find()->where(['user_id' => Yii::$app->user->id])->one();
        
        return $this->render('index',[
            'model' => $settings ? $settings : $model
        ]);
    }
    
    public function actionCity() {

        $model = new Settings();
        
        $settings = Settings::find()->where(['user_id' => Yii::$app->user->id])->one();
        $data = Yii::$app->request->post();
        
        if($settings && $settings->load($data)) {
             $model = $settings;
        } else {
            $model->load($data);
        }
        
        $model->save(false);
        
        $session = new Session;
        $session->open();
        $session->set('settings', $model);
        
         return $this->redirect('/settings');
    }


}
