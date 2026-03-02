<?php

use yii\db\Migration;

/**
 * Class m230115_095151_insert_orders_statuses
 */
class m230115_095151_insert_orders_statuses extends Migration
{
  public const TABLE_NAME = '{{%orders_statuses}}';
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {


    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'name' => 'В обработке',
        'status_color_id' => 1,
        'show' => 1,
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 2,
        'name' => 'Оплачен',
        'status_color_id' => 2,
        'show' => 1,
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 3,
        'name' => 'Доставлен',
        'status_color_id' => 3,
        'show' => 1,
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 4,
        'name' => 'Отменен',
        'status_color_id' => 3,
        'show' => 1,
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 5,
        'name' => 'Отменен',
        'status_color_id' => 3,
        'show' => 1,
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 6,
        'name' => 'Отменен',
        'status_color_id' => 3,
        'show' => 1,
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 7,
        'name' => 'Отменен',
        'status_color_id' => 3,
        'show' => 1,
      ]
    );

    $this->getDb()->createCommand('ALTER SEQUENCE orders_statuses_id_seq RESTART WITH 8')->execute();

  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
  }
}
