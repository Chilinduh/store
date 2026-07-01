<?php

use yii\db\Migration;

/**
 * Class m260701_102642_create_feeds
 */
class m260701_102642_create_feeds extends Migration
{
  public const TABLE_NAME = '{{%feeds}}';

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
        'name' => $this->string(255)->null()->comment('Название'),
        'type_id' => $this->integer()->null()->comment('Тип фида'),
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
