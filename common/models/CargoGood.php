<?php

namespace common\models;

use common\models\CargoCounterparty;
use common\models\CargoGoodRoute;

use Yii;

/**
 * This is the model class for table "cargo_good".
 *
 * @property int $id
 * @property int $counterparty_id Контрагент
 * @property int|null $capacity Объем, м3
 * @property string|null $description Описание
 * @property string|null $comment Комментарий
 * @property string|null $created_at Дата создания
 * @property string|null $deleted_at Дата удаления
 */
class CargoGood extends \yii\db\ActiveRecord
{

  public $counterparty;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargo_good';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['counterparty_id', 'capacity', 'palette' ,'weight'], 'default', 'value' => null],
            [['counterparty_id', ], 'integer'],
            [['description', 'counterparty', 'comment'], 'string'],
            [['created_at', 'deleted_at', 'id', 'capacity', 'palette' ,'weight'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'counterparty_id' => 'Клиент',
            'capacity' => 'Объем, м3',
            'palette' => 'Паллетаж, шт',
            'weight' => 'Тоннаж, кг',
            'description' => 'Описание',
            'comment' => 'Комментарий',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
        ];
    }

  public function getCounterparty()
  {

    return $this->hasOne(CargoCounterparty::class, ['id' => 'counterparty_id']);
  }

  public function getRoute()
  {

    return $this->hasOne(CargoGoodRoute::class, ['good_id' => 'id']);
  }
}
