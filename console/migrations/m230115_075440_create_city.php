<?php

use yii\db\Migration;

/**
 * Class m230115_075440_city
 */
class m230115_075440_create_city extends Migration
{

  public const TABLE_NAME = '{{%city}}';

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
        'name' => $this->string(255)->notNull()->comment('Наименование'),
        'region_id' => $this->integer()->null()->comment('Регион'),
        'country_id' => $this->integer()->null()->comment('Страна'),
        'show' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(0),
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
