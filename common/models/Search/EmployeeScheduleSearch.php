<?php

namespace common\models\Search;

use common\Exceptions\ValidationErrorException;
use common\Helper\DateTimeConstant;
use Yii;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;
use common\models\EmployeeSchedule;
use Carbon\Carbon;

class EmployeeScheduleSearch extends ActiveRecord
{

  public ?string $date = '';

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return '{{%news}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['id'], 'integer'],
      [['date'], 'string'],
    ];
  }

  public function attributeLabels()
  {
    return [
      'date' => 'date',

    ];
  }

  public function search(?array $params = []): ActiveDataProvider
  {

    if (!empty($params) && (!$this->load($params) || !$this->validate())) {

      throw ValidationErrorException::create($this->errors);
    }

    $this->date = $this->date ?? Carbon::now()->format('Y-m-t');

//    $date = Carbon::createFromFormat('Y-m-d', $params['date']);

    $query = EmployeeSchedule::find();

//    $query->andWhere('date >= :dateFrom', ['dateFrom' => Carbon::now()->format('Y-m-01')]);
//    $query->andWhere('date <= :dateTo', ['dateTo' => Carbon::now()->format('Y-m-t')]);

    $query->andFilterWhere([
      'id' => $this->id,
    ]);

      return new ActiveDataProvider([
      'query' => $query,
      'pagination' => false,
      'sort' => [
        'defaultOrder' => [
          'employee_id' => SORT_ASC,
        ],
      ],
    ]);
  }

  public function formName()
  {
    return '';
  }
}
