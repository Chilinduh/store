<?php

use yii\db\Migration;

/**
 * Class m221203_184624_create_order_items
 */
class m221203_184624_create_order_items extends Migration
{

  const TABLE_NAME = '{{%order_items}}';

  /**
   * @inheritdoc
   */
  public function up()
  {

    $table = Yii::$app->db->schema->getTableSchema(self::TABLE_NAME);
    if (null !== $table) {
      $this->dropTable(self::TABLE_NAME);
    }

    $tableOptions = null;
    $this->createTable(self::TABLE_NAME, [
      'id' => $this->bigPrimaryKey(),
      'order_id' => $this->integer()->notNull(),
      'product_id' => $this->integer()->notNull(),
      'quantity' => $this->integer()->notNull(),
      'created_at'       => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата создания'),
      'updated_at'       => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата изменения'),
      'deleted_at'       => $this->dateTime()->defaultValue(null)->comment('Дата удаления'),
    ], $tableOptions);
    $this->createIndex('order_items_order_id', self::TABLE_NAME, 'order_id');
    $this->createIndex('order_items_product_id', self::TABLE_NAME, 'product_id');
  }


  /**
   * @inheritdoc
   */
  public function down()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
