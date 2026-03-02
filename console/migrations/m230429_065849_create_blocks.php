<?php

use yii\db\Migration;

/**
 * Class m230429_065849_create_blocks
 */
class m230429_065849_create_blocks extends Migration
{

  public const TABLE_NAME = '{{%blocks}}';

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
        'page_id' => $this->integer()->null()->comment('Страница'),
        'block_type_id' => $this->integer()->null()->comment('Тип блока'),
        'description' => $this->string(255)->null()->comment('Описание'),
      ],
      $tableOptions
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'name' => 'Главная (Категории/подкатегории)',
        'page_id' => 1,
        'block_type_id' => 8,
      ],
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 2,
        'name' => 'Главная (Новости)',
        'page_id' => 1,
        'block_type_id' => 8,
      ],
    );

    $this->getDb()->createCommand('ALTER SEQUENCE blocks_id_seq RESTART WITH 3')->execute();

  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
