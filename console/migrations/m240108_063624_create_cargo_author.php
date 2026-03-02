<?php

use yii\db\Migration;

/**
 * Class m240108_063624_create_cargo_author
 */
class m240108_063624_create_cargo_author extends Migration
{

  public const TABLE_NAME = '{{%cargo_author}}';

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
        'id' => $this->primaryKey(),
        'request_id' => $this->integer()->notNull(),
        "fio" => $this->string(255)->null(), //"Соломка Константин Александрович",
        "inn" => $this->string(255)->null(), //"7726630679",
        "kpp" => $this->string(255)->null(), //"771401001",
        "is_own" => $this->tinyInteger(2)->null(), //true'
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
