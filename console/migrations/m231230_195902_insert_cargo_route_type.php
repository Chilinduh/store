<?php

use yii\db\Migration;

/**
 * Class m231230_195902_insert_cargo_route_type
 */
class m231230_195902_insert_cargo_route_type extends Migration
{

  public const TABLE_NAME = '{{%cargo_route_type}}';
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'name' => 'Загрузка',
      ],
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 2,
        'name' => 'Разгрузка',
      ],
    );

    $this->getDb()->createCommand('ALTER SEQUENCE units_id_seq RESTART WITH 3')->execute();
  }
}
