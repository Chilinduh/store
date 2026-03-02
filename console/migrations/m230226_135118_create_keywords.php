<?php

use yii\db\Migration;

/**
 * Class m230226_135118_create_keywords
 */
class m230226_135118_create_keywords extends Migration
{
  public const TABLE_NAME = '{{%keywords}}';

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
        'page' => $this->string(50)->null()->comment('Страница'),
        'title' => $this->string(255)->null()->comment('Заголовок'),
        'meta_tag_title' => $this->text()->null()->comment('Заголовок'),
        'meta_tag_keywords' => $this->text()->notNull()->comment('Ключевые слова'),
        'meta_tag_description' => $this->text()->notNull()->comment('Описание')
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
