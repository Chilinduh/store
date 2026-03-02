<?php

use yii\db\Migration;

/**
 * Class m231216_201440_create_good_request_status
 */
class m231216_201440_create_good_request_status extends Migration
{
  public const TABLE_NAME = '{{%good_request_status}}';

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
        'name' => 'Открыта',

      ],
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 2,
        'name' => 'Заказано',
      ],
    );

    $this->getDb()->createCommand('ALTER SEQUENCE good_request_status_id_seq RESTART WITH 1')->execute();

  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
