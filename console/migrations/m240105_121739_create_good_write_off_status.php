<?php

use yii\db\Migration;

/**
 * Class m240105_121739_create_good_write_off_status
 */
class m240105_121739_create_good_write_off_status extends Migration
{
  public const TABLE_NAME = '{{%good_write_off_status}}';

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
        'show' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(1),
      ],
      $tableOptions
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'name' => 'Списание',

      ],
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 2,
        'name' => 'Брак',
      ],
    );

    $this->getDb()->createCommand('ALTER SEQUENCE good_write_off_status_id_seq RESTART WITH 1')->execute();

  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
