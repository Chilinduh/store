<?php

use yii\db\Migration;

/**
 * Class m230311_183154_update_products_materials
 */
class m230311_183154_update_products_materials extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->getDb()->createCommand('ALTER SEQUENCE product_materials_id_seq RESTART WITH 2')->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
