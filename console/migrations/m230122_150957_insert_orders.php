<?php

use yii\db\Migration;

/**
 * Class m230122_150957_insert_orders
 */
class m230122_150957_insert_orders extends Migration
{

  public const TABLE_NAME = '{{%orders}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

      $this->insert(
        self::TABLE_NAME,
        [
          'id' => 1,
          'user_id' => 1,
          'status_id' => 1,
          'price' => 10000,
          'accept' => 1,
          'comment' => 'Позвонить перед оформлением',
        ],
      );
      $this->getDb()->createCommand('ALTER SEQUENCE orders_id_seq RESTART WITH 2')->execute();
    }
}
