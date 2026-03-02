<?php
namespace common\models;

use phpDocumentor\Reflection\DocBlock\Description;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $email;
    public $id;
    public $password;
    public $rememberMe = true;
    public $message = true;
    private $_user;

    /**
     * {@inheritdoc}
     */
    public function rules() {

        return [
            // username and password are both required
            [['id'], 'integer'],
            [['email', 'password'], 'string'],
            [['email', 'password'], 'required'],
            [['message'], 'string'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels() {

        return [
            'email' => 'Логин',
            'password' => 'Пароль',
            'subject' => 'Subject',
            'message' => 'message',
            'body' => 'Content',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params) {


        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Не верно введен логин или пароль!');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login() {

        $this->message = "";

        if ($this->validate()) {

            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }

        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser() {

        if ($this->_user === null || !$this->_user) {
            $this->_user = User::findByEmail($this->email);
        }

        return $this->_user;
    }
}
