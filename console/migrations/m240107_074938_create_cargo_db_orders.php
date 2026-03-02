<?php

use yii\db\Migration;

/**
 * Class m240107_074938_create_cargo_db_orders
 */
class m240107_074938_create_cargo_db_orders extends Migration
{

  public const TABLE_NAME = '{{%cargo_db_orders}}';

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
        "number" => $this->string(255)->null(), //"PO23 649 1366",
        "order_condition" => $this->string(255)->null(), //"SPOT",
        "order_view_type" => $this->string(255)->null(), //"INTERURBAN",
        "external_number" => $this->string(255)->null(), //"53603 2300-034965",
        "status_title" => $this->string(255)->null(), //"Исполнен",
        "order_status" => $this->string(255)->null(), //"PROCESSED",
        "created_at" => $this->string(255)->null(), //"2023-09-05T08:52:43.209785Z",
        "viewed_at" => $this->string(255)->null(), //"2023-12-18T07:50:55.097604Z",
        "client_role_code" => $this->string(255)->null(), //"CLIENT",
        "client_title" => $this->string(255)->null(), //"ООО \"Газпромнефть - Снабжение\"",
        "transportation_way" => $this->string(255)->null(), //"FTL",
        "resource_type_title" => $this->string(255)->null(), //"Тент 20т/82м3/33пал",
        "loading_dt" => $this->string(255)->null(), //"2023-09-06T05:00:00Z",
        "from_location_title" => $this->text()->null(), //"Ярославль",
        "route_points_count" => $this->string(255)->null(), //2,
        "to_location_title" => $this->text()->null(), //"Москва",
        "from_address_title" => $this->text()->null(), //"улица Пожарского, 66А, Ярославль",
        "to_address_title" => $this->text()->null(), //"деревня Мартемьяново, вл134, Наро-Фоминский городской округ, Московская область",
        "unloading_dt" => $this->string(255)->null(), //"2023-09-07T05:00:00Z",
        "margin_percent" => $this->string(255)->null(), //1176,
        "margin" => $this->string(255)->null(), //422065,
        "tariff_with_vat" => $this->string(255)->null(), //4306478,
        "order_chat_message" => $this->text()->null(),
        "weight_in_kg" => $this->string(255)->null(), //20000,
        "volume_in_cubic_meters" => $this->string(255)->null(), //82,
        "pallet_count" => $this->string(255)->null(), //33,
        "from_address_fact_slot_start_at" => $this->text()->null(), //"2023-09-06T10:00:00Z",
        "from_address_fact_slot_end_at" => $this->text()->null(), //"2023-09-06T16:00:00Z",
        "to_address_fact_slot_start_at" => $this->text()->null(), //null,
        "to_address_fact_slot_end_at" => $this->text()->null(), //null,
        "period_title" => $this->text()->null(), //"P23/09",
        "period_status" => $this->string(255)->null(), //"OPENED",
        "creation_type" => $this->string(255)->null(), //"MANUAL",
        "shipping_documents_status" => $this->string(255)->null(), //"NOT_LOADED",
        "shipping_documents_files" => $this->text()->null() //null,
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
