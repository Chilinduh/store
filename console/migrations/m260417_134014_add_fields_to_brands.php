<?php

use yii\db\Migration;

/**
 * Class m260417_134014_add_fields_to_brands
 */
class m260417_134014_add_fields_to_brands extends Migration
{
  public const TABLE_NAME = '{{%brands}}';

  public function safeUp()
  {
    $this->addColumn(self::TABLE_NAME, 'show_in_blocks', $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(0));
    $this->addColumn(self::TABLE_NAME, 'url', $this->text()->null()->comment('Урл'));
  }

  public function safeDown()
  {
    $this->dropColumn(self::TABLE_NAME,'show_in_blocks');
    $this->dropColumn(self::TABLE_NAME,'url');
  }
}
