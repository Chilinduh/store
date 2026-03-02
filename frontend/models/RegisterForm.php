<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class RegisterForm extends Model
{
  public $username;
  public $email;
  public $password;
  public $repeated_password;

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      ['username', 'trim'],
//      ['username', 'required'],
      ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
      ['username', 'string', 'min' => 2, 'max' => 255],

      ['email', 'trim'],
      ['email', 'required'],
      ['email', 'email'],
      ['email', 'string', 'max' => 255],
      ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Данный Email уже использован'],

      ['password', 'required'],
      ['repeated_password', 'required'],
      ['password', 'compare', 'compareAttribute' => 'repeated_password', 'message' => 'Не верно введен повторный пароль'],
      ['password', 'string', 'min' => 3],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'Email' => 'ФИО',
      'password' => 'Пароль',
      'repeated_password' => 'Повтор пароля',
    ];
  }

  /**
   * Signs user up.
   *
   * @return bool whether the creating new account was successful and email was sent
   */
  public function register()
  {

    if (!$this->validate()) {

      return null;
    }

    $user = new User();
    $user->username = $this->email;
    $user->email = $this->email;
    $user->setPassword($this->password);
    $user->generateAuthKey();
    $user->generateEmailVerificationToken();

    $user->save();

    return $this->sendEmail($user);

  }

  /**
   * Sends confirmation email to user
   * @param User $user user model to with email should be send
   * @return bool whether the email was sent
   */
  protected function sendEmail($user)
  {

    return Yii::$app
      ->mailer
      ->compose(
        ['html' => 'layouts/register'],
        [
          'user' => $user,
          'phone' => Yii::$app->params['phone']??'',
          'adminEmail' => Yii::$app->params['adminEmail']??'',
          'site' => Yii::$app->params['site']??''
        ]
      )
      ->setFrom([Yii::$app->params['adminEmail'] => 'Интернет магазин '.Yii::$app->params['site']])
      ->setTo($this->email)
      ->setSubject('Регистрация на сайте '.Yii::$app->params['site'])
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
    try {

      if ($model->load(Yii::$app->request->post()) && $model->validate()) {

        $model->save();
        return $this->render('update', [
          'model' => $model,
        ]);
      }

    } catch (StaleObjectException $e) {
      // логика разрешения конфликта версий
    }
  }


}
