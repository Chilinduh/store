<?php

use yii\db\Migration;

/**
 * Class m221204_184425_create_order_status
 */
class m221204_184425_create_order_status extends Migration
{
  public const TABLE_NAME = '{{%orders_statuses}}';

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
        'name' => $this->string(255)->notNull()->comment('Статус'),
        'status_color_id' => $this->tinyInteger()->null()->comment('Цвет'),
        'show' => $this->tinyInteger()->null()->after('name')->comment('Показать/скрыть')->defaultValue(0)
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
