<?php

use yii\db\Migration;

/**
 * Class m230114_185719_create_settings
 */
class m230114_185719_create_settings extends Migration
{
  public const TABLE_NAME = '{{%settings}}';

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
        'user_id' => $this->integer()->null()->comment('Пользователь'),
        'city_id' => $this->integer()->null()->comment('Город'),
        'stock_id' => $this->integer()->null()->comment('Склад'),
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
