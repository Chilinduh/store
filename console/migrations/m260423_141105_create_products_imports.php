<?php

use yii\db\Migration;

/**
 * Class m260423_141105_create_products_imports
 */
class m260423_141105_create_products_imports extends Migration
{
  public const TABLE_NAME = '{{%products_imports}}';

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
        'name' => $this->text()->null()->comment('Товар'),
        'url' => $this->text()->notNull()->comment('Сайт'),
        'links' => $this->text()->notNull()->comment('Ссылки'),
        'site_map' => $this->text()->notNull()->comment('Site Map'),
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
