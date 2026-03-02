<?php

use yii\db\Migration;

/**
 * Class m240107_175447_create_cargo_good_route_shipping
 */
class m240107_175447_create_cargo_good_route_shipping extends Migration
{
  public const TABLE_NAME = '{{%cargo_good_route_shipping}}';

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
        'good_route_id' => $this->integer()->null()->comment('Груз'),
        'carrier_id' => $this->integer()->null()->comment('Перевозчик'),
        'driver_id' => $this->integer()->null()->comment('Водитель'),
        'price' => $this->bigInteger()->null()->comment('Цена перевозчика'),
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
