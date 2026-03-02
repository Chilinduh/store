<?php

use yii\db\Migration;

/**
 * Class m230114_131319_create_files
 */
class m230114_131319_create_files extends Migration
{
  public const TABLE_NAME = '{{%files}}';

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
        'table_name' => $this->string(255)->notNull()->comment('Бренд'),
        'table_id' => $this->integer()->notNull()->comment('Показать/скрыть'),
        'file_type_id' => $this->integer()->notNull()->comment('Показать/скрыть'),
        'original' => $this->string(255)->notNull()->comment('Бренд'),
        'thumbnail' => $this->string(255)->notNull()->comment('Бренд'),
        'size' => $this->string(255)->notNull()->comment('Бренд'),
        'main' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(0),
        'show' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(0),
        'created_at' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата создания'),
        'updated_at' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата изменения'),
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
