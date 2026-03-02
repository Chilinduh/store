<?php

use yii\db\Migration;

/**
 * Class m230227_182008_create_news
 */
class m230227_182008_create_news extends Migration
{
  public const TABLE_NAME = '{{%news}}';

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
        'category_id' => $this->integer()->null()->comment('Категория')->defaultValue(0),
        'title' => $this->text()->null()->comment('Заголовок'),
        'announce' => $this->text()->null()->comment('Анонс'),
        'text' => $this->text()->null()->comment('Описание'),
        'date' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата создания'),
        'show' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(0),
        'created_at' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата создания'),
        'updated_at' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата изменения'),
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
