<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use common\models\Orders;
use common\models\OrderItems;

/**
 * Signup form
 */
class OrderForm extends Model
{
  public $first_name;
  public $last_name;
  public $city_id;
  public $city;
  public $country;
  public $address;
  public $phone;
  public $postal_code;
  public $comment;
  public $point_id;
  public $tariff;
  public $tariff_sum;
  public $tariff_id;
  public $user_id;
  public $email;

  /**
   * {@inheritdoc}
   */
  public function rules()
  {

    //
    return [
      [['first_name', 'last_name', 'phone'], 'required'],
      ['first_name', 'trim'],
      ['last_name', 'trim'],
      ['comment', 'trim'],
      ['first_name', 'string', 'min' => 2, 'max' => 255],
      ['last_name', 'string', 'min' => 2, 'max' => 255],

      [['tariff_id'], 'filter', 'filter' => function () {
        return $this['tariff'][0] ?? '';
      }],
      ['city', 'trim'],
      // ['user_id', 'filter', 'filter' => function ($attribute) {

      //   $user_id = Yii::$app->user->identity->id ?? false;

      //   if (Yii::$app->request->isPost && !$user_id) {

      //     $this->addError('user_id', 'Необходимо авторизоваться');
      //   }
      // }],
      ['country', 'trim'],
      ['comment', 'trim'],
      ['address', 'string', 'max' => 255],
      [['tariff_id', 'tariff_sum', 'email', 'tariff', 'user_id', 'city_id', 'point_id'], 'safe'],

    ];
  }

  public function attributeLabels()
  {

    return [
      'first_name' => 'Имя',
      'last_name' => 'Фамилия',
      'city' => 'Город',
      'country' => 'Страна',
      'phone' => 'Телефон',
      'address' => 'Адрес',
      'comment' => 'Комментарий',
      'city_id' => 'Город',
      'point_id' => 'Адрес доставки',
    ];
  }

  /**
   * Sends confirmation email to user
   * @param Orders $order user model to with email should be send
   * @param User $user user model to with email should be send
   * @return bool whether the email was sent
   */
  public function sendEmail(object $order, object $user)
  {

    return Yii::$app
      ->mailer
      ->compose(
        ['html' => 'order', 'text' => 'passwordResetToken-text'],
        ['user' => $user]
      )
      ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
      ->setTo($user->email)
      ->setSubject('Ваш заказ №' . $order->id)
      ->send();
  }

  public function sendOrderToEmail(object $order, $user = false)
  {

    return Yii::$app
      ->mailer
      ->compose(
        ['html' => 'layouts/order'],
        [
          'user' => $user,
          'order' => $order,
          'phone' => Yii::$app->params['phone']??'',
          'adminEmail' => Yii::$app->params['adminEmail']??'',
          'site' => Yii::$app->params['site']??''
        ]
      )
      ->setFrom([Yii::$app->params['adminEmail'] => 'Интернет магазин remontsnami.ru'])
      //->setTo($user->email??Yii::$app->params['order_copy_emails'])
      ->setTo(Yii::$app->params['order_copy_emails'])
      ->setSubject('Ваш заказ №' . $order->id)
      ->send();

  }

  public function actionUpdate($id)
  {

    $model = $this->findModel($id);
    try {

      if ($model && $model->load(Yii::$app->request->post())) {

        return $this->redirect(['view', 'id' => $model->id]);
      } else {

        return $this->render('update', [
          'model' => $model,
        ]);
      }

    } catch (StaleObjectException $e) {
      // логика разрешения конфликта версий
    }
  }

  public function actionCreate()
  {
    $model = new Category();

    if ($model->load(Yii::$app->request->post()) && $model->validate()) {

      $model->save();
      return $this->render('update', [
        'model' => $model,
      ]);
    }
  }

  public function formName()
  {

    return '';
  }
}
