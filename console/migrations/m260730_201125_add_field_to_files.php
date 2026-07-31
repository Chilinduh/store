<?php

use yii\db\Migration;

/**
 * Class m260730_201125_add_field_to_files
 */
class m260730_201125_add_field_to_files extends Migration
{

  public const TABLE_NAME = '{{%files}}';

  public function safeUp()
  {
    $this->addColumn(self::TABLE_NAME, 'is_creative', $this->tinyInteger()->null()->comment('Креатив')->defaultValue(0));
  }

  public function safeDown()
  {
    $this->dropColumn(self::TABLE_NAME,'is_creative');
  }
}
