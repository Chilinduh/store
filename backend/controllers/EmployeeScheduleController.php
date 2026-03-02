<?php

namespace backend\controllers;

use Carbon\Carbon;
use common\models\EmployeeSchedule;
use common\models\Search\EmployeeScheduleSearch;
use yii\data\ActiveDataProvider;
use common\models\Forms\EmployeeScheduleForm;
use common\models\Employee;
use Yii;
use yii\helpers\ArrayHelper;

class EmployeeScheduleController extends \yii\web\Controller
{

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

  public function actionHours()
  {

    $date = Yii::$app->request->post('date');
    $employeeId = Yii::$app->request->post('employeeId');
    $hours = Yii::$app->request->post('hours');
    $hours = str_replace(',', '.', $hours);
    $model = new EmployeeSchedule();
    $model = $model->find()
      ->where(['date' => $date])
      ->andWhere(['employee_id' => $employeeId])->one();

    if ($model) {

      $model->hours = $hours;

    } else {

      $model = new EmployeeSchedule([
        'date' => $date,
        'employee_id' => $employeeId,
        'hours' => $hours
      ]);
    }

    $model->save();

    die;
  }

  public function actionUpdate($id)
  {

    $model = new EmployeeSchedule();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
//            $model = new Products(); //reset model
    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionCreate()
  {

    $model = new  EmployeeSchedule();

    if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
//            $model = new Products(); //reset model
    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionIndex()
  {

    $searchModel = new EmployeeScheduleForm();
    $employeeModel = new Employee();
    $employeeModel = $employeeModel->find()->orderBy(['id' => SORT_ASC])->all();
    $searchModel->load(Yii::$app->request->post()??[]);
    $employeeSchedule = new EmployeeScheduleSearch();
    $dataProvider = $employeeSchedule->search(Yii::$app->request->post()??[]);

    return $this->render('index', [
      'employeeModel' => $employeeModel,
      'searchModel' => $searchModel,
      'employeeScheduleModel' => ArrayHelper::toArray($dataProvider->getModels()),
    ]);
  }

  public function actionDelete($id)
  {

    $model = new  EmployeeSchedule();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model) {
      $model->delete(false);
    }
    return $this->redirect('/EmployeeSchedule');
  }
}
