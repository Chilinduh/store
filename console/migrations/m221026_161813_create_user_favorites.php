<?php

use yii\db\Migration;

/**
 * Class m221026_161813_create_user_favorites
 */
class m221026_161813_create_user_favorites extends Migration
{
  const TABLE_NAME = '{{%user_favorites}}';

  /**
   * @inheritdoc
   */

  //$model->date = Yii::$app->formatter->asTime('2014-10-06 14:41:00 UTC');
  public function up()
  {
    $tableOptions = null;

    $table = Yii::$app->db->schema->getTableSchema(self::TABLE_NAME);
    if (null !== $table) {
      $this->dropTable(self::TABLE_NAME);
    }

    $this->createTable(self::TABLE_NAME, [
      'id' => $this->bigPrimaryKey(),
      'user_id' => $this->integer()->notNull(),
      'product_id' => $this->integer()->notNull(),
      'created_at'       => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата создания'),
      'deleted_at'       => $this->dateTime()->defaultValue(null)->comment('Дата удаления'),
    ], $tableOptions);

    $this->createIndex('user_favorites_user_id', self::TABLE_NAME, 'user_id');
    $this->createIndex('user_favorites_product_id', self::TABLE_NAME, 'product_id');

  }

  /**
   * @inheritdoc
   */
  public function down()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
