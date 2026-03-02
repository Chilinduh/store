<?php

namespace common\models\Query;

use Yii;
use \yii\db\ActiveQuery;

class UserQuery extends ActiveQuery
{

  public function notDeleted()
  {

    return $this->andWhere('deleted_at is null');
  }
}
