<?php

use yii\db\Migration;

/**
 * Class m221211_121704_create_search_words
 */
class m221211_121704_create_search_words extends Migration
{
  const TABLE_NAME = '{{%search_words}}';

  public function up()
  {
    $tableOptions = null;

    $table = Yii::$app->db->schema->getTableSchema(self::TABLE_NAME);
    if (null !== $table) {
      $this->dropTable(self::TABLE_NAME);
    }

    $table = Yii::$app->db->schema->getTableSchema(self::TABLE_NAME);
    if (null !== $table) {
      $this->dropTable(self::TABLE_NAME);
    }

    $this->createTable(self::TABLE_NAME, [
      'id' => $this->bigPrimaryKey(),
      'user_id' => $this->integer()->null()->comment('Пользователь'),
      'ip' => $this->string(255)->null()->comment('IP'),
      'word' => $this->string(255)->notNull()->comment('Поисковое слово'),
      'created_at'       => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата создания'),
    ], $tableOptions);

  }

  /**
   * @inheritdoc
   */
  public function down()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
