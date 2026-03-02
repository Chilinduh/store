<?php

use yii\db\Migration;

/**
 * Class m230115_075940_insert_city
 */
class m230115_075940_insert_city extends Migration
{
  public const TABLE_NAME = '{{%city}}';
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'name' => 'Москва',
        'region_id' => 1,
        'country_id' => 1,
        'show' => 1,
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 2,
        'name' => 'Питер',
        'region_id' => 1,
        'country_id' => 1,
        'show' => 1,
      ]
    );
    $this->getDb()->createCommand('ALTER SEQUENCE city_id_seq RESTART WITH 3')->execute();
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
  }
}
