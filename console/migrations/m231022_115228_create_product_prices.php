<?php

use yii\db\Migration;

/**
 * Class m231022_115228_create_product_prices
 */
class m231022_115228_create_product_prices extends Migration
{

  public const TABLE_NAME = '{{%product_prices}}';
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
        'product_id' => $this->integer()->null()->comment('Товар'),
        'price' => $this->decimal(11,2)->null()->comment('Цена'),
        'show' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(0),
        'created_at' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата создания'),
        'deleted_at' => $this->dateTime()->defaultValue(null)->comment('Дата удаления')
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
