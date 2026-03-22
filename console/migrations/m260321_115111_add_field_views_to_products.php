<?php

use yii\db\Migration;

/**
 * Class m260321_115111_add_field_views_to_products
 */
class m260321_115111_add_field_views_to_products extends Migration
{

  public const TABLE_NAME = '{{%products}}';

  public function safeUp()
  {
    $this->addColumn(self::TABLE_NAME, 'views', $this->tinyInteger()->null()->comment('Просмотры')->defaultValue(0));
  }

  public function safeDown()
  {
    $this->dropColumn(self::TABLE_NAME,'views');
  }

}
