<?php

use yii\db\Migration;

/**
 * Class m230114_131037_create_product_colors
 */
class m230114_131037_create_product_colors extends Migration
{
  public const TABLE_NAME = '{{%product_colors}}';

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
        'color' => $this->string(255)->notNull()->comment('Цвет'),
        'default' => $this->tinyInteger()->null()->comment('По умолчанию'),
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
