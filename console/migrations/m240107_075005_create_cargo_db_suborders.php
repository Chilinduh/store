<?php

use yii\db\Migration;

/**
 * Class m240107_075005_create_cargo_db_suborders
 */
class m240107_075005_create_cargo_db_suborders extends Migration
{

  public const TABLE_NAME = '{{%cargo_db_suborders}}';

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
        "suborder_number" => $this->string(255)->null(), //"TR23 474 0486",
        "carrier_title" => $this->string(255)->null(), //"ООО \"АТЭКС\"",
        "carrier_phone" => $this->string(255)->null(), //"89109104685",
        "carrier_uuid" => $this->string(255)->null(), //"adf583fe-35dd-4ac7-9c99-1838b5476e27",
        "assigned_resource_type_title" => $this->string(255)->null(), //"Тент 20т/82м3/33пал",
        "driver_fio" => $this->string(255)->null(), //"Вагин  Анатолий  Валерьевич",
        "driver_phone" => $this->string(255)->null(), //"79109104675",
        "tractor_number" => $this->string(255)->null(), //"O767KY40",
        "suborder_status" => $this->string(255)->null(), //"EXECUTION_CONFIRMED",
        "is_loop_exists" => $this->string(255)->null(), //false,
        "assigned_tariff_without_vat" => $this->string(255)->null(), //3166667,

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
