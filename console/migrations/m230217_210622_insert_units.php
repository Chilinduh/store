<?php

use yii\db\Migration;

/**
 * Class m230217_210622_insert_units
 */
class m230217_210622_insert_units extends Migration
{

  public const TABLE_NAME = '{{%units}}';
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'name' => '%',
      ],
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 2,
        'name' => 'кг.',
      ],
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 3,
        'name' => 'шт.',
      ],
    );
    $this->getDb()->createCommand('ALTER SEQUENCE units_id_seq RESTART WITH 4')->execute();
  }
}
