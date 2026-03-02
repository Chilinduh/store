<?php

use yii\db\Migration;

/**
 * Class m221212_192658_create_property
 */
class m221212_192658_create_property extends Migration
{
  const TABLE_NAME = '{{%property}}';

  public function up()
  {
    $tableOptions = null;

    $table = Yii::$app->db->schema->getTableSchema(self::TABLE_NAME);
    if (null !== $table) {
      $this->dropTable(self::TABLE_NAME);
    }

    $this->createTable(self::TABLE_NAME, [
      'id' => $this->bigPrimaryKey(),
      'name' => $this->string(255)->notNull()->comment('Наименование'),
      'prefix' => $this->string(10)->notNull()->comment('Префикс'),
      'show' => $this->tinyInteger()->null()->after('name')->comment('Показать/скрыть')->defaultValue(0)
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
