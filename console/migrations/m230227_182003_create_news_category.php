<?php

use yii\db\Migration;

/**
 * Class m230227_182003_create_news_category
 */
class m230227_182003_create_news_category extends Migration
{
  public const TABLE_NAME = '{{%news_category}}';

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
        'name' => $this->string(255)->notNull()->comment('Наименование'),
        'show' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(0)
      ],
      $tableOptions
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 23,
        'name' => 'Акции',
        'show' => 1
      ]
    );

    $this->getDb()->createCommand('ALTER SEQUENCE news_category_id_seq RESTART WITH 2')->execute();

  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
