<?php

use yii\db\Migration;

/**
 * Class m240121_164737_create_cargo_orders_carrier
 */
class m240121_164737_create_cargo_orders_carrier extends Migration
{

  public const TABLE_NAME = '{{%cargo_orders_carrier}}';

  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $tableOptions = null;

    $table = Yii::$app->db->schema->getTableSchema(self::TABLE_NAME);
    if (null !== $table) {
      $this->dropTable(self::TABLE_NAME);
    }

    $this->createTable(
      self::TABLE_NAME,
      [
        'id' => $this->primaryKey(),
        'order_id' => $this->integer()->null()->comment('Груз'),
        'carrier_id' => $this->integer()->null()->comment('Перевозчик'),
        'comment' => $this->text()->null()->comment('Комментарий'),
        'created_at' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата создания'),
        'deleted_at' => $this->dateTime()->defaultValue(null)->comment('Дата удаления'),
      ],
      $tableOptions
    );

  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
