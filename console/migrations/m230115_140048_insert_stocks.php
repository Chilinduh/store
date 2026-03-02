<?php

use yii\db\Migration;

/**
 * Class m230115_140048_insert_stocks
 */
class m230115_140048_insert_stocks extends Migration
{
  public const TABLE_NAME = '{{%stocks}}';
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'name' => 'Московский склад',
        'address_id' => 1,
      ]
    );

    $this->getDb()->createCommand('ALTER SEQUENCE property_id_seq RESTART WITH 2')->execute();

  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
  }
}
