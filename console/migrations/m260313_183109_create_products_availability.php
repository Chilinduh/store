<?php

use yii\db\Migration;

/**
 * Class m260313_183109_create_products_availability
 */
class m260313_183109_create_products_availability extends Migration
{
  public const TABLE_NAME = '{{%products_availability}}';

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
        'name' => $this->string(255)->null()->comment('Наименование'),
        'color' => $this->string(255)->null()->comment('Цвет'),
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
