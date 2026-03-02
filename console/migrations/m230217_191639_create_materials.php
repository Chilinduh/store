<?php

use yii\db\Migration;

/**
 * Class m230217_191639_create_materials
 */
class m230217_191639_create_materials extends Migration
{
  public const TABLE_NAME = '{{%materials}}';

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
        'category_id' => $this->integer()->null()->comment('Материал'),
        'name' => $this->string(255)->notNull()->comment('Материал'),
        'show' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(0)
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
