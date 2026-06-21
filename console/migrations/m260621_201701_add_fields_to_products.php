<?php

use yii\db\Migration;

/**
 * Class m260621_201701_add_fields_to_products
 */
class m260621_201701_add_fields_to_products extends Migration
{
  public const TABLE_NAME = '{{%products}}';

  public function safeUp()
  {
    $this->addColumn(self::TABLE_NAME, 'announce', $this->text()->null()->comment('Анонс (краткое описание в карточке товара)'));
  }

  public function safeDown()
  {
    $this->dropColumn(self::TABLE_NAME,'announce');
  }
}
