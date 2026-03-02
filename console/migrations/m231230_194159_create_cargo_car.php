<?php

use yii\db\Migration;

/**
 * Class m231230_194159_create_cargo_car
 */
class m231230_194159_create_cargo_car extends Migration
{

  public const TABLE_NAME = '{{%cargo_car}}';
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
        'id'   => $this->primaryKey(),
        'name' => $this->string(255)->null()->comment('Тип перевозки'),
        'car_type_id' => $this->integer()->null()->comment('Тип авто'),
        'capacity' => $this->decimal(20, 3)->defaultValue(null)->comment('Объем, м3'),
        'palette' => $this->decimal(11, 3)->defaultValue(null)->comment('Паллетаж, шт'),
        'weight' => $this->decimal(20, 3)->defaultValue(null)->comment('Тоннаж, кг'),
        'description' => $this->text()->null()->comment('Описание'),
        'comment' => $this->text()->null()->comment('Комментарий'),
        'created_at' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата создания'),
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
