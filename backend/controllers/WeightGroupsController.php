<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 17.09.19
 * Time: 13:48
 */

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Groups;
use common\models\Products;
use common\models\ProductsWeightGroup;
use yii\data\ActiveDataProvider;

use  yii\web\Session;

class WeightGroupsController extends Controller {

    public function actions() {

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

    public function actionGroups($id) {

        $model = new Products();
        $data = $model->find()->where(['product_id' => $id]);

//        $data = $query->select('*');

        return $this->render('groups/group',[
            'product_id' => $id,
            'data'=> $data,
            'model'=> $model,
            'filter' => $model
        ]);

    }

    public function actionProductsDelete($id, $group_id) {

        $model = new ProductsWeightGroup();

        $model = $model->find()->where(['id' => $group_id])->one();

        $model->delete();

        return $this->redirect('/groups/'.$id.'/products');
    }

    public function actionProducts($id) {

        $product = new Products();
        $model = new ProductsWeightGroup();
        $group = new Groups();

        $group = $group->find()->where(['id' => $id])->one();

        $data = Yii::$app->request->post();

        if ($id && $data['Products']) {

            if(!ProductsWeightGroup::find()->where(['product_id' => $data['Products']['id']])->andWhere(['group_id' => $id])->one()) {
                $model->product_id = $data['Products']['id'];
                $model->group_id = $id;
                $model->save(false);
            }
        }

        return $this->render('_form', [
            'model' => $model,
            'products' => [
                'data'=> $group->getProductsInWeightGroup(),
                'model'=> $group,
                'filter' => $group
            ]
        ]);
    }

    public function actionCreate() {
        
        $model = new Groups();
        $model->save(false);

        return $this->redirect('/groups');
    }

    public function actionUpdate($id) {

        $group = new Groups();
        $model = new ProductsWeightGroup();

        $group = $model->find()->where(['id' => $id])->one();

        $data = Yii::$app->request->post();

        if ($id && $model->load($data) && !$_FILES[Yii::$app->controller->id]['tmp_name']['file']) {

            $model->save(false);
        }

        return $this->render('_form', [
            'model' => $group,
            'products' => [
                'data'=> $group->getProductsInWeightGroup(),
                'model'=> $model,
                'filter' => $model
            ]
        ]);
    }

    public function actionDelete($id) {

        $model = new Products();

        if($id) {

            $model = $model->find()->where(['id' => $id])->one();
            if($model) {
                $model->delete();
            }
        }

        return $this->redirect('/products');
    }

    public function actionImagesDelete($id, $image_id) {

        $files = new Files();

        if($image_id) {

            $files = $files->find()->where(['id' => $image_id])->one();
            if($files) {
                $files->delete();
            }
        }

        return $this->redirect('/products/'.$id);
    }

    public function actionIndex() {

        $session = new Session;
        $user = Yii::$app->session->get('user');
        $settings = Yii::$app->session->get('settings');
        $model = new Groups();

        $data = Groups::getAllWeightGroup($settings);
        
//        print_r($data->all()); die;

        return $this->render('index',[
            'data'=> $data,
            'model'=> $model,
            'filter' => $model
        ]);

    }
}
