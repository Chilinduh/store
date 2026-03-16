<?php

use yii\db\Migration;

/**
 * Class m260316_104047_add_field_show_blocks
 */
class m260316_104047_add_field_show_blocks extends Migration
{
  public const TABLE_NAME = '{{%blocks}}';

  public function safeUp()
  {
    $this->addColumn(self::TABLE_NAME, 'show', $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(1));
  }

  public function safeDown()
  {
    $this->dropColumn(self::TABLE_NAME,'show');
  }

}
