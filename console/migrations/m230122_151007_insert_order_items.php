<?php

use yii\db\Migration;

/**
 * Class m230122_151007_insert_order_items
 */
class m230122_151007_insert_order_items extends Migration
{

  public const TABLE_NAME = '{{%order_items}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->insert(
        self::TABLE_NAME,
        [
          'id' => 1,
          'order_id' => 1,
          'product_id' => 4,
          'quantity' => 2,
        ],
      );
      $this->getDb()->createCommand('ALTER SEQUENCE order_items_id_seq RESTART WITH 2')->execute();
    }
}
