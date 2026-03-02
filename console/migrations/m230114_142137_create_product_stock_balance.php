<?php

use yii\db\Migration;

/**
 * Class m230114_142137_create_product_stock_balance
 */
class m230114_142137_create_product_stock_balance extends Migration
{
  public const TABLE_NAME = '{{%product_stock_balance}}';

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
        'stock_id' => $this->integer()->notNull()->comment('Бренд'),
        'product_id' => $this->integer()->notNull()->comment('Категория'),
        'quantity' => $this->integer()->notNull()->comment('Производитель'),
        'color_id' => $this->integer()->notNull()->comment('Тип упаковки'),
        'size_id' => $this->integer()->notNull()->comment('Цена'),
        'show' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(0),
        'created_at' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата создания'),
        'updated_at' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата изменения'),
        'deleted_at' => $this->dateTime()->defaultValue(null)->comment('Дата удаления'),
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
