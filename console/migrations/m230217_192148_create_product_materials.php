<?php

use yii\db\Migration;

/**
 * Class m230217_192148_create_product_materials
 */
class m230217_192148_create_product_materials extends Migration
{
  const TABLE_NAME = '{{%product_materials}}';

  public function up()
  {
    $tableOptions = null;

    $table = Yii::$app->db->schema->getTableSchema(self::TABLE_NAME);
    if (null !== $table) {
      $this->dropTable(self::TABLE_NAME);
    }

    $this->createTable(self::TABLE_NAME, [
      'id' => $this->bigPrimaryKey(),
      'product_id' => $this->integer()->notNull()->comment('Товар'),
      'material_id' => $this->integer()->notNull()->comment('Материал'),
      'unit_id' => $this->integer()->notNull()->comment('Единицы'),
      'value' => $this->integer(4)->notNull()->comment('Материал'),
      'created_at' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата создания'),
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
