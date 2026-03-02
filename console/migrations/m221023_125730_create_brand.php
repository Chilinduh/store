<?php

use yii\db\Migration;

/**
 * Class m221023_125730_create_brand
 */
class m221023_125730_create_brand extends Migration
{
  public const TABLE_NAME = '{{%brands}}';

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
        'name' => $this->string(255)->notNull()->comment('Бренд'),
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
