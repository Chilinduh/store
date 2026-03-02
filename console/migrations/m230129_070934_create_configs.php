<?php

use yii\db\Migration;

/**
 * Class m230129_070934_create_configs
 */
class m230129_070934_create_configs extends Migration
{

  public const TABLE_NAME = '{{%configs}}';

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
        'cdek' => $this->tinyInteger(2)->null()->comment('Использовать Сдек'),
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
