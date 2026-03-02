<?php

use yii\db\Migration;

/**
 * Class m231230_192920_create_cargo_carrier
 */
class m231230_192920_create_cargo_carrier extends Migration
{

  public const TABLE_NAME = '{{%cargo_carrier}}';

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
        'name' => $this->string(255)->null()->comment('Перевозчик'),
        'fio' => $this->string(255)->null()->comment('Контактное лицо'),
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
