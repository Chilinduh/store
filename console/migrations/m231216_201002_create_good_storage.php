<?php

use yii\db\Migration;

/**
 * Class m231216_201002_create_good_storage
 */
class m231216_201002_create_good_storage extends Migration
{

  public const TABLE_NAME = '{{%good_storage}}';
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
        'code' => $this->string(255)->null()->comment('Код товара'),
        'name' => $this->string(255)->null()->comment('Название товара'),
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
