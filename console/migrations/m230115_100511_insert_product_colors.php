<?php

use yii\db\Migration;

/**
 * Class m230115_100511_insert_product_colors
 */
class m230115_100511_insert_product_colors extends Migration
{
  public const TABLE_NAME = '{{%product_colors}}';
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'name' => 'Белый',
        'color' => '#ffffff',
        'default' => 1,
        'show' => 1,
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 2,
        'name' => 'Черный',
        'color' => '#000000',
        'default' => 0,
        'show' => 1,
      ]
    );

    $this->getDb()->createCommand('ALTER SEQUENCE product_colors_id_seq RESTART WITH 3')->execute();

  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
  }
}
