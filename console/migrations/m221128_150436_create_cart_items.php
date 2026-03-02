<?php

use yii\db\Migration;

/**
 * Class m221128_150436_create_cart_items
 */
class m221128_150436_create_cart_items extends Migration
{
    /**
     * {@inheritdoc}
     */

  const TABLE_NAME = '{{%cart_items}}';
  public function up()
  {
    $tableOptions = null;

    $table = Yii::$app->db->schema->getTableSchema(self::TABLE_NAME);
    if (null !== $table) {
      $this->dropTable(self::TABLE_NAME);
    }

    $this->createTable(self::TABLE_NAME, [
      'id' => $this->bigPrimaryKey(),
      'cart_id'         => $this->integer()->notNull()->comment('Идентификатор заказа'),
      'product_id'          => $this->integer()->notNull()->comment('Идентификатор товара'),
      'quantity'         => $this->integer(4)->notNull()->comment('Количество товара'),
      'created_at'       => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата создания'),
      'updated_at'       => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата изменения'),
      'deleted_at'       => $this->dateTime()->defaultValue(null)->comment('Дата удаления'),
    ], $tableOptions);
  }

  /**
   * @inheritdoc
   */
  public function down()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
