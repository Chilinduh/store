<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 09.10.19
 * Time: 19:14
 */

namespace common\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

class Stocks extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return '{{%stocks}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id','address_id'], 'integer'],
            [['name'], 'string'],
        ];
    }

    public function attributeLabels() {

        return [
            'name' => 'Название',
            'address_id' => 'Адрес',

        ];
    }

    public static function getAll() {

        return static::find()->all();
    }
//

    public static function stock()
    {
//        return $this->find(['show' => self::STATUS_ACTIVE]);
    }

    public static function getCity($stock_id) {

        return static::find()->select(['stocks.id','city.name as name'])
                    ->leftJoin('addresses', 'addresses.id = stocks.address_id')
                    ->leftJoin('city', 'city.id = addresses.city_id')
                    ->where(['stocks.id' => $stock_id])
                    ->one();
    }

}







