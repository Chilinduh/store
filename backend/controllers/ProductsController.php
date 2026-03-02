<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Products;
use common\models\Ingredients;
use common\models\ProductGroups;
use common\models\ProductPrices;
use common\models\ProductAttributes;
use common\models\ProductAttributesValues;
use common\models\Files;
use common\models\Stocks;
use common\models\ProductImages;
use common\models\ProductsIngredients;
use common\models\ProductStockBalance;
use common\models\Search\ProductsSearch;
use common\models\ProductProperty;
use common\models\ProductMaterials;
use common\models\ProductsSources;
use common\models\Category;
use yii\data\ActiveDataProvider;
use common\models\ProductItems;    
use common\models\ProductsRelated;


class ProductsController extends Controller
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

  public function actionGroups($id)
  {

    $model = new Products();
    $data = $model->find()->where(['product_id' => $id]);

//        $data = $query->select('*');

    return $this->render('groups/group', [
      'product_id' => $id,
      'data' => $data,
      'model' => $model,
      'filter' => $model
    ]);

  }

  public function actionGroupsUpdate($id, $item_id)
  {

    $model = new ProductItems();

    $model = $model->find()->where(['id' => $item_id])->one();

    $data = Yii::$app->request->post();

    if ($item_id && $model->load($data) && !$_FILES[Yii::$app->controller->id]['tmp_name']['file']) {
      $model->save(false);
    }

    return $this->render('groups/_form', [
      'model' => $model,
      'prices' => [
        'data' => $model->getPrices(),
        'model' => $model,
        'filter' => $model
      ]
    ]);
  }

  public function actionGroupsCreate()
  {

    $model = new ProductItems();

    $data = Yii::$app->request->post();

    if ($model->load($data) && !$_FILES[Yii::$app->controller->id]['tmp_name']['file']) {

      $model->save(false);
    }

    return $this->render('_form', [
      'model' => $model,
//            'images' => $model->getImages()->all()
    ]);
  }

  public function actionCreate()
  {

    $product = new Products();
    $productBalance = new ProductStockBalance();

    $data = Yii::$app->request->post();

    if ($product->load($data) && $product->validate()) {

      $product->save(false);

      $productsSources = new ProductsSources([
        'product_id' => $product->id,
        'source_description' => $product->description,
      ]);
      $productsSources->save();

//      $productBalance->stock_id = 1;
//      $productBalance->product_id = $product->id;
//      $productBalance->quantity = 1;
//      $productBalance->save(false);

      return $this->redirect('/products/' . $product->id);
    }

    return $this->render('_update_product', [
      'model' => $product,
      'filter' => $product,
//            'images' => $model->getImages()->all()
    ]);
  }

  public function actionIngredientsUpdate($id)
  {

    $form = Yii::$app->request->post();

    $product_ingredients = new ProductsIngredients();

    if ($id && $form['Ingredients']) {

      $ingredients = ProductsIngredients::find()->where(['product_id' => $id, 'ingredient_id' => $form['Ingredients']['id']])->one();
      if (!$ingredients) {

        $product_ingredients->product_id = $id;
        $product_ingredients->ingredient_id = $form['Ingredients']['id'];
        $product_ingredients->save(false);
      }
    }

    return $this->redirect('/products/' . $id);
  }


  public function actionIngredientsDelete($id, $ingredient_id)
  {

    if ($id && $ingredient_id) {

      $ingredients = ProductsIngredients::find()->where(['product_id' => $id, 'ingredient_id' => $ingredient_id])->one();
      if ($ingredients) {

        $ingredients->delete();
      }
    }

    return $this->redirect('/products/' . $id);
  }

  public function actionMaterialsDelete($id, $material_id)
  {

    if ($id && $material_id) {

      $material = ProductMaterials::findOne($material_id);

      if ($material) {

        $material->delete();
      }
    }

    return $this->redirect('/products/' . $id . '/materials');
  }


  public function actionMaterials($id)
  {

    $productMaterials = new ProductMaterials();
    $model = $this->findModel($id);

    $productMaterials->product_id = $id;

    if (Yii::$app->request->isPost) {

      if ($model && $productMaterials->load(Yii::$app->request->post())) {

        if ($productMaterials->save()) {


        }
      }
    }

    $dataProvider = new ActiveDataProvider([
      'query' => $model->getProductMaterials(),
      'pagination' => [
        'pageSize' => 15
      ]
    ]);

    return $this->render('_update_materials', [
      'searchModel' => $model,
      'dataProvider' => $dataProvider,
      'productMaterials' => $productMaterials,
      'model' => $model
    ]);
  }

  public function actionRelated($id)
  {

    $productRelated = new ProductsRelated();
    $model = $this->findModel($id);

    if (Yii::$app->request->isPost) {

      if ($model && $productRelated->load(Yii::$app->request->post())) {

        $productRelated->product_id = $id;
        if ($productRelated->save()) {


        }
      }
    }

    $query = Products::find()->leftJoin('products_related pr', 'pr.product_related_id = products.id')->andWhere(['pr.product_id' => $id]);

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
      'pagination' => [
        'pageSize' => 55
      ]
    ]);

    return $this->render('_update_related', [
      'searchModel' => $model,
      'dataProvider' => $dataProvider,
      'productRelated' => $productRelated,
      'model' => $model
    ]);
  }

  public function actionAttributes($id)
  {

    $model = $this->findModel($id);

    $productAttributesModel = new ProductAttributes();
    $productAttributes = $productAttributesModel->find()->where(['attribute_group_id' => $model->attribute_group_id])->all();

    if (Yii::$app->request->isPost) {

      if ($model && $productAttributesModel->load(Yii::$app->request->post('Products'))) {


        foreach ($productAttributesModel->attributes as $key => $attribute) {

          $productAttributesValues = new ProductAttributesValues();
          $params = [
            'product_id' => $id,
            'product_attribute_id' => $key
          ];

          $productAttributesValue = $productAttributesValues->find()->where($params)->one();
          $productAttributesValue = $productAttributesValue ?? new ProductAttributesValues($params);
          $productAttributesValue->value = $attribute;

          $productAttributesValue->save(false);
        }
      }
    }

    return $this->render('_update_attributes', [
      'searchModel' => $model,
      'productAttributes' => $productAttributes,
      'model' => $model
    ]);
  }

  public function actionPrices($id)
  {

    $model = $this->findModel($id);
    $productPrices = new ProductPrices();
    $productPrices->product_id = $id;

    if (Yii::$app->request->isPost) {

      if ($model && $productPrices->load(Yii::$app->request->post())) {

        if ($productPrices->save()) {

        }
      }
    }

    $dataProvider = new ActiveDataProvider([
      'query' => $model->getProductPrices(),
      'pagination' => [
        'pageSize' => 15
      ]
    ]);

    return $this->render('_update_prices', [
      'searchModel' => $model,
      'dataProvider' => $dataProvider,
      'productPrices' => $productPrices,
      'model' => $model
    ]);
  }

  public function actionUpdateSources($id)
  {

    $model = $this->findModel($id);

    if (Yii::$app->request->isPost && $model) {

      if ($model->productSources->load(Yii::$app->request->post()) && $model->productSources->save()) {

      }
    }

    $productSources = $model->productSources->id ?? false;
    if (!$productSources) {

      $productSources = new ProductsSources([
        'product_id' => $model->id,
        'source_description' => $model->description
      ]);
      $productSources->save();
    } else {

      $productSources = ProductsSources::findOne(['product_id' => $model->id]);
    }

    return $this->render('_update_sources', [
      'productSource' => $productSources,
      'model' => $model
    ]);
  }

  public function actionUpdateFiles($id)
  {

    $model = new Products();
    $files = new Files();
    $ingredients = new Ingredients();

    $model = $model->find()->where(['id' => $id])->one();

    if (Yii::$app->request->isPost) {

      if ($id && $model->load(Yii::$app->request->post())) {

        if ($model->save(false) && $_FILES) {

          $path = \Yii::getAlias('@productImages') . '/' . $model->id;
          $path_to_save = '/images/' . Yii::$app->controller->id . '/' . $model->id;
          $file_path = $_FILES[ucfirst(Yii::$app->controller->id)]['tmp_name']['file'];

          $files->saveFiles([
            'table_name' => Yii::$app->controller->id,
            'table_id' => $model->id,
            'file_path' => $file_path,
            'file_name' => ucfirst(Yii::$app->controller->id) . '[file]',
//        'file_name' => $_FILES[ucfirst(Yii::$app->controller->id)]['name']['file'][0],
            'path' => $path,
            'path_to_save' => $path_to_save,
          ], ['width' => 100, 'height' => 100]);

        }
      }

      return $this->redirect('/products/' . $id . '/update-files');

    }

    $dataProvider = new ActiveDataProvider([
      'query' => $model->getFiles(),
      'pagination' => [
        'pageSize' => 15
      ]
    ]);

    return $this->render('_update_files', [
      'searchModel' => $model,
      'dataProvider' => $dataProvider,
      'total' => $total ?? [],
      'model' => $model
    ]);

  }

  public function actionUpdate($id)
  {

    $model = $this->findModel($id);

    if (Yii::$app->request->isPost && $model) {

      if ($model->load(Yii::$app->request->post())) {

        if ($model->property_id) {
          $productProperty = ProductProperty::findOne(['product_id' => $id]);
          if ($productProperty) {
            $productProperty->property_id = $model->property_id;
            $productProperty->save();
          } else {
            $productProperty = new ProductProperty([
              'property_id' => $model->property_id,
              'product_id' => $id,
            ]);
            $productProperty->save();
          }
        }

        $productPrice = new ProductPrices([
          'price' => $model->price,
          'product_id' => $id,
        ]);
        $productPrice->save();

        $model->save();
      }

    } else {

      $productProperty = ProductProperty::findOne(['product_id' => $id]);
      if ($productProperty) {
        $model->property_id = $productProperty->property_id;
      }

    }

    return $this->render('_update_product', [
      'model' => $model,
      'ingredients' => [
        'data' => $model->getIngredients(),
        'model' => $model,
        'filter' => $model,
      ]
    ]);
  }

  public function actionDelete($id)
  {

    $model = new Products();

    if ($id) {

      $model = $model->find()->where(['id' => $id])->one();
      if ($model) {
        $model->delete();
      }
    }

    return $this->redirect('/products');
  }


  public function actionImagesDelete($id, $file_id)
  {

    $files = new Files();

    if ($file_id) {

      $files = $files->find()->where(['id' => $file_id])->one();
      if ($files) {
        $files->delete();
      }
    }

    return $this->redirect('/products/' . $id . '/update-files');
  }

  public function actionIndex()
  {

    $params = $this->request->queryParams;

    $productSources = new ProductsSources();
    $productSource = $productSources->find()->where([
      '!=', 'rewrite_description', ''
    ])->all();

    $source_description = 0;
    $rewrite_description = 0;
    foreach ($productSource as $item) {

      $source_description += strlen($item->source_description);
      $rewrite_description += strlen($item->rewrite_description);
    }

    $searchModel = new ProductsSearch();
    $dataProvider = $searchModel->search($params ?? []);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
      'total' => $total ?? [],
      'contentData' => [
        'total' => count(Products::find()->all()),
        'rewriteTotal' => count($productSource),
        'source_description' => $source_description,
        'rewrite_description' => $rewrite_description
      ]
    ]);
  }

  private function findModel($id)
  {

    if (!$model = Products::findOne($id)) {
      throw new NotFoundHttpException(Yii::t('app', 'Не найден товар с id={id}', ['id' => $id]));
    }

    return $model;
  }
}
