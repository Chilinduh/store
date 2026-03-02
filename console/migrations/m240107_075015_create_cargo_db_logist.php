<?php

use yii\db\Migration;

/**
 * Class m240107_075015_create_cargo_db_logist
 */
class m240107_075015_create_cargo_db_logist extends Migration
{

  public const TABLE_NAME = '{{%cargo_db_logist}}';

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
        'db_order_id' => $this->integer()->null(),
        "logist_fio" => $this->string(255)->null(), //"Соломка Константин Александрович",
        "participant_title" => $this->string(255)->null(), //"ООО \"ОБОЗ ДИДЖИТАЛ\"",
        "participant_inn" => $this->string(255)->null(), //"7726630679",
        "participant_kpp" => $this->string(255)->null(), //"771401001",
        "is_own" => $this->string(255)->null(), //true'

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
