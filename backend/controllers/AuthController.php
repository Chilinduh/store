<?php
namespace backend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\forms\LoginForm;
use common\models\User;
use common\models\Settings;

use  yii\web\Session;


class AuthController extends Controller
{


    public $layout = 'auth';

    public $bodyClass = 'index';

    public function init() {
        parent::init();
        $this->bodyClass = 'index';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],

            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get','post'],
                    'login' => ['get','post'],

                ],
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
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
    public function actionIndex()
    {


        //         $news = new News();
        $user = new User();
        $model = new LoginForm();
        if (Yii::$app->user->isGuest) {

            return $this->render('login', [
                 'model' => $model,
            ]);
        }

        $this->redirect(['index']);
    }

    public function actionLogin() {

        $this->bodyClass = '';
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('index');
        }

        $model = new LoginForm();
        $settings = new Settings();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            $session = new Session;
            $session->open();
            $session->set('user', Yii::$app->user);

            $settings = Settings::find()->where(['user_id'=>Yii::$app->user->id])->one();

            $session->set('settings', $settings);

            return $this->redirect('site');
        } else {

            $model->password = '';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
         return $this->render('login', []);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {

        Yii::$app->user->logout();
        $this->redirect(['login']);
    }

}
