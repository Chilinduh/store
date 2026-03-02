<?php

use yii\db\Migration;

/**
 * Class m231230_190017_create_cargo_good_route
 */
class m231230_190017_create_cargo_good_route extends Migration
{
  public const TABLE_NAME = '{{%cargo_good_route}}';

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
        'good_id' => $this->integer()->notNull()->comment('Груз'),
        'driver_id' => $this->integer()->null()->comment('Водитель'),
        'city_start' => $this->text()->null()->comment('Город вначале маршрута'),
        'city_end' => $this->text()->null()->comment('Город в конце маршрута'),
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
