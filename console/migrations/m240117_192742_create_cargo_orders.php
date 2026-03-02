<?php

use yii\db\Migration;

/**
 * Class m240117_192742_create_cargo_orders
 */
class m240117_192742_create_cargo_orders extends Migration
{

  public const TABLE_NAME = '{{%cargo_orders}}';

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
        'number' => $this->string(255)->null()->comment('Номер'),
        'number_ati' => $this->string(255)->null()->comment('Номер Ati'),
        'url_ati' => $this->text()->null()->comment('URL Ati'),

        'address_from' => $this->text()->null()->comment('Адрес, погрузки'),
        'address_to' => $this->text()->null()->comment('Адрес, доставки'),

        'route_start' => $this->string(255)->null()->comment('Старт маршрута'),
        'route_end' => $this->string(255)->null()->comment('Конец маршрута'),

        'counterparty_price' => $this->bigInteger()->null()->comment('Оплата от клиента'),
        'carrier_price' => $this->bigInteger()->null()->comment('Оплата перевозчику'),

        'good_id' => $this->integer()->null()->comment('Груз'),
        'good_type_id' => $this->integer()->null()->comment('Тип груза'),
        'driver_id' => $this->integer()->null()->comment('Водитель'),
        'car_type_id' => $this->integer()->null()->comment('Тип машины'),
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
