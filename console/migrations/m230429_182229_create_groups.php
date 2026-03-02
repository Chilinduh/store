<?php

use yii\db\Migration;

/**
 * Class m230429_182229_create_groups
 */
class m230429_182229_create_groups extends Migration
{

  public const TABLE_NAME = '{{%groups}}';

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
        'id'   => $this->primaryKey(),
        'name' => $this->string(255)->null()->comment('Наименование'),
        'description' => $this->string(255)->null()->comment('Описание'),
        'show' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(1),
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
