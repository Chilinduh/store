<?php

use yii\db\Migration;

/**
 * Class m260511_134901_add_field_to_attributes_groups
 */
class m260511_134901_add_field_to_attributes_groups extends Migration
{

  public const TABLE_NAME = '{{%attributes_groups}}';

  public function safeUp()
  {
    $this->addColumn(self::TABLE_NAME, 'description', $this->text()->null()->comment('Информация (публикуция в конце описания для всех товаров этой группы)'));
  }

  public function safeDown()
  {
    $this->dropColumn(self::TABLE_NAME,'description');
  }
}
