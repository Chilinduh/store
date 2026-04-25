<?php

use yii\db\Migration;

/**
 * Class m260424_140434_create_products_imports_pages
 */
class m260424_140434_create_products_imports_pages extends Migration
{
  public const TABLE_NAME = '{{%products_imports_pages}}';

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
        'url' => $this->text()->null()->comment('Урл страницы'),
        'html' => $this->text()->notNull()->comment('Содержимое страницы'),
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
