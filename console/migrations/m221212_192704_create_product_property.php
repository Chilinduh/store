<?php

use yii\db\Migration;

/**
 * Class m221212_192704_create_product_property
 */
class m221212_192704_create_product_property extends Migration
{
  const TABLE_NAME = '{{%product_property}}';

  public function up()
  {
    $tableOptions = null;

    $table = Yii::$app->db->schema->getTableSchema(self::TABLE_NAME);
    if (null !== $table) {
      $this->dropTable(self::TABLE_NAME);
    }

    $this->createTable(self::TABLE_NAME, [
      'id' => $this->bigPrimaryKey(),
      'product_id' => $this->integer()->notNull()->comment('Товар'),
      'property_id' => $this->integer()->notNull()->comment('Свойство'),
      'created_at' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата создания'),
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
