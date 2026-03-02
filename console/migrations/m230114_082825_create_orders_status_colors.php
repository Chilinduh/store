<?php

use yii\db\Migration;

/**
 * Class m230114_082825_create_orders_status_colors
 */
class m230114_082825_create_orders_status_colors extends Migration
{
  public const TABLE_NAME = '{{%orders_status_colors}}';

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
        'name' => $this->string(50)->notNull()->comment('Цвет'),
        'color' => $this->string(10)->notNull()->comment('Цвет'),
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
