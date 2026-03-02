<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cargo_db_logist".
 *
 * @property int $id
 * @property int|null $db_order_id
 * @property string|null $logist_fio
 * @property string|null $participant_title
 * @property string|null $participant_inn
 * @property string|null $participant_kpp
 * @property string|null $is_own
 */
class CargoDbLogist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargo_db_logist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['db_order_id'], 'default', 'value' => null],
            [['db_order_id'], 'integer'],
            [['logist_fio', 'participant_title', 'participant_inn', 'participant_kpp', 'is_own'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'db_order_id' => 'Db Order ID',
            'logist_fio' => 'Logist Fio',
            'participant_title' => 'Participant Title',
            'participant_inn' => 'Participant Inn',
            'participant_kpp' => 'Participant Kpp',
            'is_own' => 'Is Own',
        ];
    }
}
