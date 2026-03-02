<?php

use yii\db\Migration;

/**
 * Class m230115_112745_insert_property
 */
class m230115_112745_insert_property extends Migration
{

  public const TABLE_NAME = '{{%property}}';
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'name' => 'Распродажа',
        'prefix' => 'sale',
        'show' => 1,
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 2,
        'name' => 'Новинка',
        'prefix' => 'new',
        'show' => 1,
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 3,
        'name' => 'Горячее предложение',
        'prefix' => 'hot',
        'show' => 1,
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 4,
        'name' => 'Лучшее предложение',
        'prefix' => 'best',
        'show' => 1,
      ]
    );

    $this->getDb()->createCommand('ALTER SEQUENCE property_id_seq RESTART WITH 5')->execute();

  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
  }
}
