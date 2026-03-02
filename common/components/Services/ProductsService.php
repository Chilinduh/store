<?php

namespace common\components\Services;

use common\models\OrderItems;
use common\models\ProductStockBalance;
use common\components\order\Model\OrderStatus;


class OrderService
{

  public function getProductsCount(int $id = null) {

    if($id) {

      $stock = ProductStockBalance::getProduct($id);
      $orders = OrderItems::find()
              ->select(['count()'])
              ->leftJoin(Orders::tableName(), 'id = order_items.order_id')
              ->where(['!=', 'orders.status', [OrderStatus::STATUS_CANCELED]])
              ->andWhere(['order_items.product_id', $id])
              ->all();


    }
  }
}


