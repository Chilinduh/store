<?php

use yii\db\Migration;

/**
 * Class m230205_174245_create_orders_cdek
 */
class m230205_174245_create_orders_cdek extends Migration
{

  public const TABLE_NAME = '{{%orders_cdek}}';
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
        'order_id' => $this->integer()->notNull()->comment('Пользователь'),
        'city_id' => $this->integer()->notNull()->comment('Город'),
        'point_id' => $this->string(20)->null()->comment('Офис'),
        'tariff_id' => $this->integer()->null()->comment('Тариф'),
        'tariff_sum' => $this->integer()->null()->comment('Сумма доставки'),
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
