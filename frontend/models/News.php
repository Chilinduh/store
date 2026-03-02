<?php
namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * User model
 *
 * @property integer $id
 * @property string $name
 * @property string $announce
 * @property string $text
 * @property integer $created_at
 * @property integer $updated_at
 */
class News extends ActiveRecord
{

    public static function tableName()
    {
        return '{{%news}}';
    }
    
    public function rules()
    {
        return [
            ['name', 'announce']            
        ];
    }
    
    public static function getDb()
    {
        return '<pre>'.var_dump(Yii::$app).'</pre>';
    }

    

}
