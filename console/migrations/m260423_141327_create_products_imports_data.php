<?php

use yii\db\Migration;

/**
 * Class m260423_141327_create_products_imports_data
 */
class m260423_141327_create_products_imports_data extends Migration
{
  public const TABLE_NAME = '{{%products_imports_data}}';

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
        'product_import_id' => $this->integer()->null()->comment('Импорт'),
        'product_id' => $this->integer()->null()->comment('Товар'),
        'source' => $this->text()->null()->comment('Источник'),
        'data' => $this->text()->null()->comment('данные'),
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
