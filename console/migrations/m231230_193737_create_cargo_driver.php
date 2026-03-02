<?php

use yii\db\Migration;

/**
 * Class m231230_193737_create_cargo_driver
 */
class m231230_193737_create_cargo_driver extends Migration
{

  public const TABLE_NAME = '{{%cargo_driver}}';

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
        'name' => $this->string(255)->null()->comment('Имя'),
        'first_name' => $this->string(255)->null()->comment('Фамилия'),
        'last_name' => $this->string(255)->null()->comment('Отчество'),
        'carrier_id' => $this->integer()->null()->comment('Перевозчик'),
        'car_id' => $this->integer()->null()->comment('Авто'),
        'address' => $this->text()->null()->comment('Адрес'),
        'phone' => $this->string(255)->null()->comment('Телефон'),
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
