<?php

use yii\db\Migration;

/**
 * Class m260225_201302_add_field_attribute_filter_id_attributes
 */
class m260225_201302_add_field_attribute_filter_id_attributes extends Migration
{

    public const TABLE_NAME = '{{%attributes}}';

    public function safeUp()
    {
        $this->addColumn(self::TABLE_NAME, 'attribute_filter_id', $this->integer());
    }

    public function safeDown()
    {
        $this->dropColumn(self::TABLE_NAME,'attribute_filter_id');
    }
}
