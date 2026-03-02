<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cargo_author".
 *
 * @property int $id
 * @property int $request_id
 * @property string|null $fio
 * @property string|null $inn
 * @property string|null $kpp
 * @property int|null $is_own
 */
class CargoAuthor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargo_author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['request_id'], 'required'],
            [['request_id', 'is_own'], 'default', 'value' => null],
            [['request_id', 'is_own'], 'integer'],
            [['fio', 'inn', 'kpp'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'request_id' => 'Request ID',
            'fio' => 'Fio',
            'inn' => 'Inn',
            'kpp' => 'Kpp',
            'is_own' => 'Is Own',
        ];
    }
}
