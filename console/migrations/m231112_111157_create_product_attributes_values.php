<?php

use yii\db\Migration;

/**
 * Class m231112_111157_create_table_product_attributes_values
 */
class m231112_111157_create_product_attributes_values extends Migration
{

  public const TABLE_NAME = '{{%product_attributes_values}}';

  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $tableOptions = null;

    $table = Yii::$app->db->schema->getTableSchema(self::TABLE_NAME);
    if (null !== $table) {
//      $this->dropTable(self::TABLE_NAME);
    }

    $this->createTable(
      self::TABLE_NAME,
      [
        'id' => $this->primaryKey(),
        'product_id' => $this->integer()->notNull()->comment('Товар'),
        'product_attribute_id' => $this->integer()->notNull()->comment('Аттрибут'),
        'value' => $this->text()->null()->comment('Значение атрибута')->defaultValue('')
      ],
      $tableOptions
    );

    $this->getDb()->createCommand('ALTER SEQUENCE product_attributes_values_id_seq RESTART WITH 1')->execute();
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
