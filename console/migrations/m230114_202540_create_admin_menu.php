<?php

use yii\db\Migration;

/**
 * Class m221023_161251_create_admin_menu
 */
class m230114_202540_create_admin_menu extends Migration
{
  const TABLE_NAME = '{{%admin_menu}}';

  /**
   * @inheritdoc
   */
  public function up()
  {
    $tableOptions = null;

    $table = Yii::$app->db->schema->getTableSchema(self::TABLE_NAME);
    if (null !== $table) {
      $this->dropTable(self::TABLE_NAME);
    }

    $this->createTable(self::TABLE_NAME, [
      'id' => $this->bigPrimaryKey(),
      'root' => $this->integer(),
      'lft' => $this->integer()->notNull(),
      'rgt' => $this->integer()->notNull(),
      'lvl' => $this->smallInteger(5)->notNull(),
      'name' => $this->string(60)->notNull(),
      'icon' => $this->string(255),
      'icon_type' => $this->smallInteger(1)->notNull()->defaultValue(1),
      'url' => $this->string(60)->notNull(),
      'active' => $this->boolean()->notNull()->defaultValue(true),
      'selected' => $this->boolean()->notNull()->defaultValue(false),
      'disabled' => $this->boolean()->notNull()->defaultValue(false),
      'readonly' => $this->boolean()->notNull()->defaultValue(false),
      'visible' => $this->boolean()->notNull()->defaultValue(true),
      'collapsed' => $this->boolean()->notNull()->defaultValue(false),
      'movable_u' => $this->boolean()->notNull()->defaultValue(true),
      'movable_d' => $this->boolean()->notNull()->defaultValue(true),
      'movable_l' => $this->boolean()->notNull()->defaultValue(true),
      'movable_r' => $this->boolean()->notNull()->defaultValue(true),
      'removable' => $this->boolean()->notNull()->defaultValue(true),
      'removable_all' => $this->boolean()->notNull()->defaultValue(false),
      'child_allowed' => $this->boolean()->notNull()->defaultValue(true),
    ], $tableOptions);
    $this->createIndex('admin_menu_NK1', self::TABLE_NAME, 'root');
    $this->createIndex('admin_menu_NK2', self::TABLE_NAME, 'lft');
    $this->createIndex('admin_menu_NK3', self::TABLE_NAME, 'rgt');
    $this->createIndex('admin_menu_NK4', self::TABLE_NAME, 'lvl');
    $this->createIndex('admin_menu_NK5', self::TABLE_NAME, 'active');
  }


  /**
   * @inheritdoc
   */
  public function down()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
