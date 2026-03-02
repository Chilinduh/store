<?php

use yii\db\Migration;

/**
 * Class m231230_191318_create_cargo_good_route_delivery
 */
class m231230_191318_create_cargo_good_route_direction extends Migration
{

  public const TABLE_NAME = '{{%cargo_good_route_direction}}';

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
        'good_route_id' => $this->integer()->notNull()->comment('Маршрут'),
        'address_start' => $this->text()->null()->comment('Адрес '),
        'address_end' => $this->text()->null()->comment('Адрес'),
        'lat' => $this->string(10)->null()->comment('Lat'),
        'lon' => $this->string(10)->null()->comment('Lon'),
        'date_start' => $this->dateTime()->defaultValue(null)->comment('Дата'),
        'date_end' => $this->dateTime()->defaultValue(null)->comment('Дата'),
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
