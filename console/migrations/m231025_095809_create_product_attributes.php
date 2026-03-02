<?php

use yii\db\Migration;

/**
 * Class m231025_095809_create_product_attributes
 */
class m231025_095809_create_product_attributes extends Migration
{

  public const TABLE_NAME = '{{%product_attributes}}';

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
        'id' => $this->primaryKey(),
        'attribute_id' => $this->integer()->notNull()->comment('Аттрибут')->defaultValue(0),
        'attribute_group_id' => $this->integer()->notNull()->comment('Группа аттрибутов')->defaultValue(0),
        'show' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(1),
      ],
      $tableOptions
    );

    $this->getDb()->createCommand('ALTER SEQUENCE product_attributes_id_seq RESTART WITH 1')->execute();

  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
