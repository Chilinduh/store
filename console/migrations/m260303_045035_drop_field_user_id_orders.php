<?php

use yii\db\Migration;

/**
 * Class m260303_045035_drop_field_user_id_orders
 */
class m260303_045035_drop_field_user_id_orders extends Migration
{

    public const TABLE_NAME = '{{%attributes}}';

    public function safeUp()
    {
        $this->dropColumn(self::TABLE_NAME,'user_id');
        $this->addColumn(self::TABLE_NAME, 'user_id', $this->integer());
    }
}
