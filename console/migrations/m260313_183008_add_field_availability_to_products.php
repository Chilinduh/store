<?php

use yii\db\Migration;

/**
 * Class m260313_183008_add_field_availability_to_products
 */
class m260313_183008_add_field_availability_to_products extends Migration
{
  public const TABLE_NAME = '{{%products}}';

  public function safeUp()
  {
    $this->addColumn(self::TABLE_NAME, 'availability_id', $this->integer());
  }

  public function safeDown()
  {
    $this->dropColumn(self::TABLE_NAME,'availability_id');
  }

}
