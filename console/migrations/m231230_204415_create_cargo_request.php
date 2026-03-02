<?php

use yii\db\Migration;

/**
 * Class m231230_204415_create_cargo_request
 */
class m231230_204415_create_cargo_request extends Migration
{

  public const TABLE_NAME = '{{%cargo_request}}';

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
        'number' => $this->string(255)->notNull()->comment('Номер'),
        'good_id' => $this->integer()->null()->comment('Груз'),
        'address_from' => $this->text()->null()->comment('Адрес, погрузки'),
        'address_to' => $this->text()->null()->comment('Адрес, доставки'),

        'route_start' => $this->string(255)->null()->comment('Старт маршрута'),
        'route_end' => $this->string(255)->null()->comment('Конец маршрута'),

        'price' => $this->bigInteger()->null()->comment('Оплата от клиента'),

        'date' => $this->dateTime()->defaultValue(null)->comment('Дата'),
        'description' => $this->text()->null()->comment('Описание'),
        'comment' => $this->text()->null()->comment('Комментарий'),
        'archive' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(1),
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
