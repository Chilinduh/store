<?php

use yii\db\Migration;

/**
 * Class m230311_112303_update_units
 */
class m230311_112303_update_units extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->getDb()->createCommand('ALTER SEQUENCE units_id_seq RESTART WITH 4')->execute();
    }

}
