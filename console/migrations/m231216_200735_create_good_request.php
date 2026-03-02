<?php

use yii\db\Migration;

/**
 * Class m231216_200735_create_good_request
 */
class m231216_200735_create_good_request extends Migration
{

  public const TABLE_NAME = '{{%good_request}}';
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
        'good_request_status_id' => $this->integer()->null()->comment('Статус заявки')->defaultValue(1),
        'show' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(1),
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
