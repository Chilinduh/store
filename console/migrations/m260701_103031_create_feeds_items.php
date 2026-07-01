<?php

use yii\db\Migration;

/**
 * Class m260701_103031_create_feeds_items
 */
class m260701_103031_create_feeds_items extends Migration
{
    
  public const TABLE_NAME = '{{%feeds_items}}';

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
        'feed_id' => $this->integer()->null()->comment('Фид'),
        'product_id' => $this->integer()->null()->comment('Товар'),        
        'created_at' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата создания')
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
