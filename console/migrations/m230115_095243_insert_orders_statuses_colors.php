<?php

use yii\db\Migration;

/**
 * Class m230115_095243_insert_orders_statuses_colors
 */
class m230115_095243_insert_orders_statuses_colors extends Migration
{
  public const TABLE_NAME = '{{%orders_status_colors}}';
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'name' => 'Черный',
        'color' => '#000000',
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 2,
        'name' => 'Серый',
        'color' => '#808080',
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 3,
        'name' => 'Серебряный',
        'color' => '#808080',
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 4,
        'name' => 'Белый',
        'color' => '#ffffff',
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 5,
        'name' => 'Красный',
        'color' => '#ff0000',
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 6,
        'name' => 'Жёлтый',
        'color' => '#ffff00',
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 7,
        'name' => 'Зелёный',
        'color' => '#008000',
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 8,
        'name' => 'Золотой',
        'color' => '#ffd700',
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 9,
        'name' => 'Оранжевый',
        'color' => '#ffa500',
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 10,
        'name' => 'Средний синий',
        'color' => '#0000cd',
      ]
    );

    $this->getDb()->createCommand('ALTER SEQUENCE orders_status_colors_id_seq RESTART WITH 11')->execute();

  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
  }
}
