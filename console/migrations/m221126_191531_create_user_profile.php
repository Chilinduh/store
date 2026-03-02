<?php

use yii\db\Migration;

/**
 * Class m221126_191531_create_user_profile
 */
class m221126_191531_create_user_profile extends Migration
{

  const TABLE_NAME = '{{%user_profile}}';

  /**
   * @inheritdoc
   */

  public function up()
  {
    $tableOptions = null;

    $table = Yii::$app->db->schema->getTableSchema(self::TABLE_NAME);
    if (null !== $table) {
      //$this->dropTable(self::TABLE_NAME);
    }

    $this->createTable(self::TABLE_NAME, [
      'id' => $this->bigPrimaryKey(),
      'user_id' => $this->integer()->notNull(),
      'first_name' => $this->string(60)->null(),
      'last_name' => $this->string(60)->null(),
      'phone' => $this->string(60)->null(),
      'country' => $this->string(60)->notNull(),
      'city' => $this->string(60)->notNull(),
      'address' => $this->text()->notNull(),
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
