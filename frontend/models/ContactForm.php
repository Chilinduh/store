<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
  public $name;
  public $email;
  public $subject;
  public $body;
  public $verifyCode;

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      // name, email, subject and body are required
      [['name', 'email', 'subject', 'body'], 'required'],
      [['name', 'email', 'subject', 'body'], 'string'],
      // email has to be a valid email address
      ['email', 'email'],
      // verifyCode needs to be entered correctly
//      ['verifyCode', 'captcha'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'name' => 'ФИО',
      'email' => 'Email',
      'subject' => 'Тема',
      'body' => 'Текс сообщения',
    ];
  }

  /**
   * Sends an email to the specified email address using the information collected by this model.
   *
   * @return bool whether the email was sent
   */
  public function sendEmail()
  {

    return Yii::$app->mailer->compose('layouts/contacts', [
      'name' => $this->name,
      'email' => $this->email,
      'subject' => $this->subject,
      'body' => $this->body
    ])
      ->setTo($this->email)
      ->setFrom([ Yii::$app->params['adminEmail'] => $this->name])
      ->setSubject($this->subject)
      ->setTextBody($this->body)
      ->send();
  }

  public function formName()
  {
    return '';
  }
}
