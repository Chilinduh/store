<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[FeedsItems]].
 *
 * @see FeedsItems
 */
class FeedsItemsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return FeedsItems[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return FeedsItems|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
