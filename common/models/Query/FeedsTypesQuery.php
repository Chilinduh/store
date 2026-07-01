<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[FeedsTypes]].
 *
 * @see FeedsTypes
 */
class FeedsTypesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return FeedsTypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return FeedsTypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
