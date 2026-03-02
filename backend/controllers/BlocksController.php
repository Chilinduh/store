<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\Blocks;
use common\models\BlocksTypes;
use common\models\BlocksGroups;

class BlocksController extends Controller
{

  public function actionUpdate($id)
  {

    $model = $this->findModel($id);
    $params = Yii::$app->request->post();

    if (Yii::$app->request->isPost && $model->load($params) && $model->save()) {

      if (isset($model->group_id)) {

        $blocksGroups =  BlocksGroups::findOne(['block_id' => $model->id]);
        if($blocksGroups) {

          $blocksGroups->group_id = $model->group_id;
        } else {

          $blocksGroups = new BlocksGroups([
            'block_id' => $model->id,
            'group_id' => $model->group_id,
          ]);
        }
        $blocksGroups->save();
      }
    } else {

      if($model->block_type_id == BlocksTypes::BLOCK_CATEGORY) {


        $blocksGroups =  BlocksGroups::findOne(['block_id' => $model->id]);
        if($blocksGroups) {

          $model->group_id = $blocksGroups->group_id;
        }
      }

    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionCreate()
  {

    $model = new Blocks();

    if ($model->load(Yii::$app->request->post()) && $model->save()) {


    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionIndex()
  {

    $searchModel = new Blocks();
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

  public function actionDelete($id)
  {

    $model = new Blocks();
    $model = $model->find()->where(['id' => $id])->one();

    if ($model) {
      $model->delete(false);
    }

    return $this->redirect('/blocks');
  }


  private function findModel($id)
  {

    if (!$model = Blocks::findOne($id)) {
      throw new NotFoundHttpException(Yii::t('app', 'Не найден блок с id={id}', ['id' => $id]));
    }

    return $model;
  }

}
