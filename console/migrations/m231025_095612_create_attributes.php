<?php

use yii\db\Migration;

/**
 * Class m231025_095612_create_attributes
 */
class m231025_095612_create_attributes extends Migration
{

  public const TABLE_NAME = '{{%attributes}}';

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
        'name' => $this->string(255)->null()->comment('Наименование'),
        'show' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(1),
      ],
      $tableOptions
    );

    $this->getDb()->createCommand('ALTER SEQUENCE attributes_id_seq RESTART WITH 1')->execute();
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
