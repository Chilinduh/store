<?php

use yii\db\Migration;

/**
 * Class m230114_130138_create_delivery_types
 */
class m230114_130138_create_delivery_types extends Migration
{
  public const TABLE_NAME = '{{%delivery_types}}';

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
