<?php

use yii\db\Migration;

/**
 * Class m230121_102038_insert_products
 */
class m230121_102038_insert_products extends Migration
{
  public const TABLE_NAME = '{{%products}}';

  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'name' => 'Футболка',
        'code' => '1000',
        'brand_id' => 1,
        'category_id' => 9,
        'manufacturer_id' => 1,
        'packaging_type_id' => 1,
        'price' => 3500,
        'weight' => 300,
        'title' => '',
        'description' => '',
        'main' => 1,
        'show' => 1,
      ],
    );


    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 2,
        'name' => 'Толстовка',
        'code' => '1000',
        'brand_id' => 1,
        'category_id' => 11,
        'manufacturer_id' => 1,
        'packaging_type_id' => 1,
        'price' => 3500,
        'weight' => 300,
        'title' => '',
        'description' => '',
        'main' => 1,
        'show' => 1,
      ],
    );


    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 3,
        'name' => 'Толстовка',
        'code' => '1000',
        'brand_id' => 1,
        'category_id' => 11,
        'manufacturer_id' => 1,
        'packaging_type_id' => 1,
        'price' => 3500,
        'weight' => 300,
        'title' => '',
        'description' => '',
        'main' => 1,
        'show' => 1,
      ],
    );

    $this->getDb()->createCommand('ALTER SEQUENCE products_id_seq RESTART WITH 4')->execute();

  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
  }
}
