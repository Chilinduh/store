<?php

namespace common\models\Query;

/**
 * This is the ActiveQuery class for [[FeedsModel]].
 *
 * @see FeedsModel
 */
class FeedsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return FeedsModel[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return FeedsModel|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
