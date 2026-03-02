<?php

use yii\db\Migration;

/**
 * Class m230217_185545_insert_brands
 */
class m230217_185545_insert_brands extends Migration
{

  public const TABLE_NAME = '{{%brands}}';
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'name' => 'Sobakafun',
        'show' => 1,
      ],
    );
    $this->getDb()->createCommand('ALTER SEQUENCE brands_id_seq RESTART WITH 2')->execute();
  }
}
