<?php

use yii\db\Migration;

/**
 * Class m221120_125121_create_user_password_restore
 */
class m221120_125121_create_user_password_restore extends Migration
{
  const TABLE_NAME = '{{%user_password_restore}}';

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
      'code' => $this->string(60)->notNull(),
      'active' => $this->boolean()->notNull()->defaultValue(true),
    ], $tableOptions);

    $this->createIndex('user_password_restore_user_id', self::TABLE_NAME, 'user_id');

  }

  /**
   * @inheritdoc
   */
  public function down()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
