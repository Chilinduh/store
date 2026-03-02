<?php

use yii\db\Migration;

/**
 * Class m230101_085432_create_product_size
 */
class m230101_085432_create_product_sizes extends Migration
{
  public const TABLE_NAME = '{{%product_size}}';

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

    $table = Yii::$app->db->schema->getTableSchema(self::TABLE_NAME);
    if (null !== $table) {
      $this->dropTable(self::TABLE_NAME);
    }

    $this->createTable(
      self::TABLE_NAME,
      [
        'id' => $this->primaryKey(),
        'eu_size' => $this->string(20)->notNull()->comment('EU Размер'),
        'ru_size' => $this->string(20)->notNull()->comment('RU Размер'),
        'default' => $this->tinyInteger()->null()->comment('По умолчанию'),
        'show' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(0)
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
