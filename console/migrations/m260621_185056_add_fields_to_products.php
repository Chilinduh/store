<?php

use yii\db\Migration;

/**
 * Class m260621_185056_add_fields_to_products
 */
class m260621_185056_add_fields_to_products extends Migration
{
  public const TABLE_NAME = '{{%products}}';

  public function safeUp()
  {
    $this->addColumn(self::TABLE_NAME, 'tag_title', $this->text()->null()->comment('Тэг Title'));
    $this->addColumn(self::TABLE_NAME, 'tag_keywords', $this->text()->null()->comment('Тэг Kwywords'));
    $this->addColumn(self::TABLE_NAME, 'tag_description', $this->text()->null()->comment('Тэг Description'));
  }

  public function safeDown()
  {
    $this->dropColumn(self::TABLE_NAME,'tag_title');
    $this->dropColumn(self::TABLE_NAME,'tag_keywords');
    $this->dropColumn(self::TABLE_NAME,'tag_description');
  }
}
