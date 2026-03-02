<?php

namespace common\models\Query;

use Yii;
use \yii\db\ActiveQuery;

class CartQuery extends ActiveQuery
{

  public function byActive()
  {

    return $this->andWhere('deleted_at is null');
  }

  public function byUser()
  {

    return $this->andWhere(['user_id' => Yii::$app->user->getIdentity()->id]);
  }
}
