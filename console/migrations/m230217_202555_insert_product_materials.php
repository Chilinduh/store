<?php

use yii\db\Migration;

/**
 * Class m230217_202555_insert_product_materials
 */
class m230217_202555_insert_product_materials extends Migration
{
  public const TABLE_NAME = '{{%product_materials}}';
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'product_id' => 19,
        'material_id' => 1,
        'unit_id' => 1,
        'value' => 100,
      ],
    );
    $this->getDb()->createCommand('ALTER SEQUENCE brands_id_seq RESTART WITH 2')->execute();
  }
}
