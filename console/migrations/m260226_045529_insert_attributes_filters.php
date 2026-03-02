<?php

use yii\db\Migration;

/**
 * Class m260226_045529_insert_attributes_filters
 */
class m260226_045529_insert_attributes_filters extends Migration
{

    public const TABLE_NAME = '{{%attributes_filters}}';
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'name' => 'Чекбокс',
      ],
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 2,
        'name' => 'Ползунок',
      ],
    );
    $this->getDb()->createCommand('ALTER SEQUENCE attributes_filters_id_seq RESTART WITH 3')->execute();
  }
}
