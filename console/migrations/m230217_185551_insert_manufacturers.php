<?php

use yii\db\Migration;

/**
 * Class m230217_185551_insert_manufacturers
 */
class m230217_185551_insert_manufacturers extends Migration
{

  public const TABLE_NAME = '{{%manufacturers}}';
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'name' => 'Россия',
        'show' => 1,
      ],
    );
    $this->getDb()->createCommand('ALTER SEQUENCE manufacturers_id_seq RESTART WITH 2')->execute();
  }
}
