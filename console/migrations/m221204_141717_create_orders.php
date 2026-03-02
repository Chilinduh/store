<?php

use yii\db\Migration;

/**
 * Class m221204_141717_create_order
 */
class m221204_141717_create_orders extends Migration
{
  const TABLE_NAME = '{{%orders}}';

  public function up()
  {

    $table = Yii::$app->db->schema->getTableSchema(self::TABLE_NAME);
    if (null !== $table) {
      $this->dropTable(self::TABLE_NAME);
    }

    $tableOptions = null;
    $this->createTable(self::TABLE_NAME, [
      'id' => $this->bigPrimaryKey(),
      'user_id' => $this->integer()->notNull(),
      'status_id' => $this->integer()->notNull(),
      'price' => $this->integer()->notNull(),
      'accept' => $this->boolean()->null()->comment('Аферта'),
      'comment' => $this->text()->null()->comment('Комментарий'),
      'created_at' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата создания'),
      'updated_at' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата изменения'),
      'deleted_at' => $this->dateTime()->defaultValue(null)->comment('Дата удаления'),
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
