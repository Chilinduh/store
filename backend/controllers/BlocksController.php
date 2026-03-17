<?php

namespace backend\controllers;

use Yii;
use common\models\Files;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\Blocks;
use common\models\BlocksTypes;
use common\models\BlocksGroups;
use common\models\BlocksBanners;
use common\models\BlocksBannersCarousel;

class BlocksController extends Controller
{

  public function actionBanners($id)
  {

    $model = BlocksBanners::find()->where(['block_id' => $id])->one();

    $files = new Files();

    if (Yii::$app->request->isPost) {

      if ($id && $model->load(Yii::$app->request->post())) {
        if ($model->save(false) && isset($_FILES['BlocksBanners']['tmp_name']['file']) && !empty($_FILES['BlocksBanners']['tmp_name']['file'])) {

          $path = \Yii::getAlias('@bannersImages') . '/' . $id;
          $path_to_save = '/images/banners/' . $id;
          $file_path = $_FILES['BlocksBanners']['tmp_name']['file'];

          $files->saveFiles([
            'replace' => true,
            'table_name' => Yii::$app->controller->id,
            'table_id' => $id,
            'file_path' => $file_path,
            'file_name' => 'BlocksBanners[file]',
            'path' => $path,
            'path_to_save' => $path_to_save,
          ], ['width' => 660, 'height' => 210]);
        }
      }
    }

    return $this->redirect('/blocks/' . $id);
  }

  public function actionBannersCarouselCreate($id)
  {

    $model = new BlocksBannersCarousel();
    $files = new Files();

    if (Yii::$app->request->isPost) {

      if ($model->load(Yii::$app->request->post())) {
        $model->block_id = $id;
        if ($model->save()) {
          if (isset($_FILES['BlocksBannersCarousel']['tmp_name']['file']) && !empty($_FILES['BlocksBannersCarousel']['tmp_name']['file'])) {

            $path = \Yii::getAlias('@bannersImages') . '/' . $id;
            $path_to_save = '/images/banners/' . $id;
            $file_path = $_FILES['BlocksBannersCarousel']['tmp_name']['file'];

            $files->saveFiles([
              'replace' => true,
              'table_name' => 'blocks_banners_carousel',
              'table_id' => $model->id,
              'file_path' => $file_path,
              'file_name' => 'BlocksBannersCarousel[file]',
              'path' => $path,
              'path_to_save' => $path_to_save,
            ], ['width' => 660, 'height' => 210]);
          }
        }
      }
    }

    return $this->redirect('/blocks/' . $id);
  }

  public function actionUpdate($id)
  {

    $model = $this->findModel($id);
    $params = Yii::$app->request->post();

    if (Yii::$app->request->isPost && $model->load($params) && $model->save()) {

      if (isset($model->group_id)) {

        $blocksGroups = BlocksGroups::findOne(['block_id' => $model->id]);
        if ($blocksGroups) {

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
//
//      if($model->block_type_id == BlocksTypes::BLOCK_CATEGORY) {
//
//
//        $blocksGroups =  BlocksGroups::findOne(['block_id' => $model->id]);
//        if($blocksGroups) {
//
//          $model->group_id = $blocksGroups->group_id;
//        }
//      }

    }

    return $this->render('_form', [
      'model' => $model
    ]);
  }

  public function actionCreate()
  {

    $model = new Blocks();

    if ($model->load(Yii::$app->request->post()) && $model->save()) {

      if ($model->block_type_id == BlocksTypes::BLOCK_BANNERS_LEFT || $model->block_type_id == BlocksTypes::BLOCK_BANNERS_RIGHT || $model->block_type_id == BlocksTypes::BLOCK_BANNERS_CAROUSEL) {

        $blockBanners = new BlocksBanners(['block_id' => $model->id, 'link' => '']);
        $blockBanners->save(false);

      }

      return $this->redirect('/blocks/' . $model->id);

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

  public function actionBannersCarouselDelete($id)
  {

    $model = new BlocksBannersCarousel();
    $model = $model->find()->where(['id' => $id])->one();
    $blockId = $model->block_id;
    if ($model) {
      $model->delete(false);
    }

    return $this->redirect('/blocks/'.$blockId);
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
