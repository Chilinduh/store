<?php

use yii\db\Migration;

/**
 * Class m231201_160219_create_products_sources
 */
class m231201_160219_create_products_sources extends Migration
{

  public const TABLE_NAME = '{{%products_sources}}';

  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $tableOptions = null;

    $table = Yii::$app->db->schema->getTableSchema(self::TABLE_NAME);
    if (null !== $table) {
//      $this->dropTable(self::TABLE_NAME);
    }

    $this->createTable(
      self::TABLE_NAME,
        [
        'id' => $this->primaryKey(),
        'product_id' => $this->integer()->notNull()->comment('Товар'),
        'source_description' => $this->text()->null()->comment('Оригинальное описание')->defaultValue(''),
        'rewrite_description' => $this->text()->null()->comment('Рерайт/Копирайт описания')->defaultValue(''),
        'source_url' => $this->text()->null()->comment('Url источник(ов)')->defaultValue('')
      ],
      $tableOptions
    );

    $this->getDb()->createCommand('ALTER SEQUENCE products_sources_id_seq RESTART WITH 1')->execute();
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
