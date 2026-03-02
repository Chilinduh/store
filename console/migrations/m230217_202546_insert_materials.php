<?php

use yii\db\Migration;

/**
 * Class m230217_202546_insert_materials
 */
class m230217_202546_insert_materials extends Migration
{

  public const TABLE_NAME = '{{%materials}}';
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'name' => 'Хлопок',
      ],
    );
    $this->getDb()->createCommand('ALTER SEQUENCE products_id_seq RESTART WITH 2')->execute();
  }
}
