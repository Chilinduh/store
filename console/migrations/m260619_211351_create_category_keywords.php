<?php

use yii\db\Migration;

/**
 * Class m260619_211351_create_category_keywords
 */
class m260619_211351_create_category_keywords extends Migration
{

  public const TABLE_NAME = '{{%category_keywords}}';

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
        'category_id' => $this->integer()->null()->comment('Категория'),
        'meta_tag_title' => $this->text()->null()->comment('Заголовок'),
        'meta_tag_keywords' => $this->text()->notNull()->comment('Ключевые слова'),
        'meta_tag_description' => $this->text()->notNull()->comment('Описание'),
        'created_at' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата создания')
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
