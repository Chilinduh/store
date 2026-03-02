<?php

use yii\db\Migration;

/**
 * Class m221128_150429_create_cart
 */
class m221128_150429_create_cart extends Migration
{

  const TABLE_NAME = '{{%cart}}';
  public function up()
  {
    $tableOptions = null;

    $table = Yii::$app->db->schema->getTableSchema(self::TABLE_NAME);
    if (null !== $table) {
      $this->dropTable(self::TABLE_NAME);
    }

    $this->createTable(self::TABLE_NAME, [
      'id' => $this->bigPrimaryKey(),
      'user_id' => $this->integer()->notNull(),
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
