<?php

namespace common\models\Query;

use Yii;
use \yii\db\ActiveQuery;

class BlocksQuery extends ActiveQuery
{

  public function byActive()
  {

    return $this->andWhere(['show' => 1]);
  }

}
