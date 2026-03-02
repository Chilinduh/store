<?php

use yii\db\Migration;

/**
 * Class m240105_121526_create_good_write_off
 */
class m240105_121526_create_good_write_off extends Migration
{

  public const TABLE_NAME = '{{%good_write_off}}';
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
        'name' => $this->string(255)->null()->comment('Название товара'),
        'code' => $this->string(255)->null()->comment('Штрих код'),
        'count' => $this->tinyInteger()->null()->defaultValue(1)->comment('Количество товара'),
        'good_write_off_status_id' => $this->integer()->null()->comment('Статус заявки')->defaultValue(null),
        'created_at' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата создания'),
        'deleted_at' => $this->dateTime()->defaultValue(null)->comment('Дата удаления')
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
