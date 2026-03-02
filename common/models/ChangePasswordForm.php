<?php

namespace common\models;

use common\models\User;
use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class ChangePasswordForm extends Model
{
  public $password;
  public $repeated_password;

  /**
   * @var \common\models\User
   */
  private $_user;

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      ['password', 'required'],
      ['repeated_password', 'required'],
      ['password', 'compare', 'compareAttribute' => 'repeated_password', 'message' => 'Не верно введен повторный пароль'],
      ['password', 'string', 'min' => 3],
    ];
  }

  /**
   * Creates a form model given a token.
   *
   * @param string $token
   * @param array $config name-value pairs that will be used to initialize the object properties
   * @throws InvalidArgumentException if token is empty or not valid
   */
  public function __construct($token, $config = [])
  {
    if (empty($token) || !is_string($token)) {
      throw new InvalidArgumentException('Password reset token cannot be blank.');
    }
    $this->_user = User::findByPasswordResetToken($token);
    if (!$this->_user) {
      throw new InvalidArgumentException('Не верный токен');
    }
    parent::__construct($config);
  }

  /**
   * Signs user up.
   *
   * @return bool whether the creating new account was successful and email was sent
   */
  public function changePassword()
  {

    if (!$this->validate()) {

      return null;
    }
    $this->_user->setPassword($this->password);

    return $this->_user->save();
//        return $this->sendEmail($user);

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
        ['user' => $user]
      )
      ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
      ->setTo($this->email)
      ->setSubject('Account registration at ' . Yii::$app->name)
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

}
