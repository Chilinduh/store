<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cargo_db_author".
 *
 * @property int $id
 * @property int|null $db_order_id
 * @property string|null $author_fio
 * @property string|null $participant_title
 * @property string|null $participant_inn
 * @property string|null $participant_kpp
 */
class CargoDbAuthor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargo_db_author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['db_order_id'], 'default', 'value' => null],
            [['db_order_id'], 'integer'],
            [['author_fio', 'participant_title', 'participant_inn', 'participant_kpp'], 'string', 'max' => 255],
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
            'author_fio' => 'Author Fio',
            'participant_title' => 'Participant Title',
            'participant_inn' => 'Participant Inn',
            'participant_kpp' => 'Participant Kpp',
        ];
    }
}
