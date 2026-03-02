<?php
namespace common\models;

use common\models\Query\UserQuery;
use common\models\UserProfile;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use common\components\Behaviors\TimeToDateBehavior;
use yii\db\Expression;


/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */

class User extends ActiveRecord implements IdentityInterface
{
  const STATUS_DELETED = 0;
  const STATUS_INACTIVE = 10;
  const STATUS_ACTIVE = 10;

  public String $country = '';
  public String $city = '';
  public String $first_name = '';
  public String $last_name = '';
  public String $phone = '';
  public String $address = '';
  public String $password = '';

  public function afterFind() {

//        $this->created_at = \Yii::$app->formatter->asDate($this->created_at, 'yyyy-MM-dd HH:mm:ss');
//        $this->updated_at = \Yii::$app->formatter->asDate($this->updated_at, 'yyyy-MM-dd HH:mm:ss');

    parent::afterFind ();
  }

  /**
   * {@inheritdoc}
   */
  public static function tableName() {

    return '{{%users}}';
  }

  /**
   * {@inheritdoc}
   */
//    public function behaviors()
//    {
//        return [
//            TimestampBehavior::className(),
//        ];
//    }

//    public function behaviors()
//    {
//        return [
//            [
//                'class' => TimeToDateBehavior::className(),
//                'attributes' => [
//                    ActiveRecord::EVENT_BEFORE_VALIDATE => 'formatted',
//                    ActiveRecord::EVENT_AFTER_FIND => 'formatted',
//                ],
//                'timeAttribute' => 'created_at'
//            ]
//        ];
//    }

  public function getUserProfile() {

    return $this->hasOne(UserProfile::className(), ['user_id' => 'id']);
  }

  public function getImages() {

    return $this->hasMany(Images::className(), ['table_id' => 'id'])->andWhere(['table_name'=>'user', 'size' => Images::MAIN]);
  }

  /**
   * {@inheritdoc}
   */
  public function rules() {

    return [
      [['id'], 'integer'],
      [['username', 'password', 'first_name', 'last_name', 'country', 'city', 'phone', 'address'], 'string'],
      [['status'], 'integer'],
      [['created_at'], 'integer'],
      [['updated_at'], 'integer'],
      [['rememberme'], 'integer'],
      [['phones'], 'string'],
      [['email'], 'string'],
//             [['show'],'boolean'],
//            ['formatted', 'date', 'format' => 'php:d.m.Y'],
      //['email', 'unique', 'targetAttribute' => ['name', 'external']]
      ['email', 'unique']
    ];
  }

  public function attributeLabels() {

    return [
      'username' => 'Email',
      'phones' => 'Телефон',
      'status' => 'Статус',
      'show' => 'Показывать/Cкрыть',
      'email' => 'Email',
      'country' => 'Страна',
      'city' => 'Город',
      'phone' => 'Телефон',
      'password' => 'Пароль',
      'first_name' => 'Имя',
      'last_name' => 'Фамилия',
      'address' => 'Адрес',
      'created_at' => 'Дата создания',
      'updated_at' => 'Дата обновления',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function findIdentity($id) {

    return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
  }

  /**
   * {@inheritdoc}
   */
  public static function findIdentityByAccessToken($token, $type = null) {

    throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
  }

  /**
   * Finds user by username
   *
   * @param string $username
   * @return static|null
   */
  public static function findByUsername($username) {

    return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
  }

  public static function findByEmail($username) {

    $query = static::find()->where(['email' => $username, 'status' => self::STATUS_ACTIVE])->andWhere('deleted_at is null');
    return $query->one();
  }

  /**
   * Finds user by password reset token
   *
   * @param string $token password reset token
   * @return static|null
   */

  public static function findByPasswordResetToken($token) {

    if (!static::isPasswordResetTokenValid($token)) {
      return null;
    }

    return static::findOne([
      'password_reset_token' => $token,
      'status' => self::STATUS_ACTIVE,
    ]);
  }

  /**
   * Finds user by verification email token
   *
   * @param string $token verify email token
   * @return static|null
   */
  public static function findByVerificationToken($token) {
    return static::findOne([
      'verification_token' => $token,
      'status' => self::STATUS_INACTIVE
    ]);
  }

  /**
   * Finds out if password reset token is valid
   *
   * @param string $token password reset token
   * @return bool
   */
  public static function isPasswordResetTokenValid($token)
  {
    if (empty($token)) {
      return false;
    }

    $timestamp = (int) substr($token, strrpos($token, '_') + 1);
    $expire = Yii::$app->params['user.passwordResetTokenExpire'];

    return $timestamp + $expire >= time();
  }

  /**
   * {@inheritdoc}
   */
  public function getId()
  {
    return $this->getPrimaryKey();
  }

  /**
   * {@inheritdoc}
   */
  public function getAuthKey()
  {
    return $this->auth_key;
  }

  public static function getAll() {

    return static::findAll([]);
  }

  /**
   * {@inheritdoc}
   */
  public function validateAuthKey($authKey)
  {
    return $this->getAuthKey() === $authKey;
  }

  /**
   * Validates password
   *
   * @param string $password password to validate
   * @return bool if password provided is valid for current user
   */
  public function validatePassword($password)
  {
    return Yii::$app->security->validatePassword($password, $this->password_hash);
  }

  /**
   * Generates password hash from password and sets it to the model
   *
   * @param string $password
   */
  public function setPassword($password)
  {
    $this->password_hash = Yii::$app->security->generatePasswordHash($password);
  }

  /**
   * Generates "remember me" authentication key
   */
  public function generateAuthKey()
  {
    $this->auth_key = Yii::$app->security->generateRandomString();
  }

  /**
   * Generates new password reset token
   */
  public function generatePasswordResetToken()
  {
    $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
  }

  public function generateEmailVerificationToken()
  {
    $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
  }

  /**
   * Removes password reset token
   */
  public function removePasswordResetToken()
  {
    $this->password_reset_token = null;
  }

  /**
   * @return CartQuery
   */
  public static function find(): UserQuery
  {

    $query = new UserQuery(static::class);
    return $query;
  }

  public function users() {

    return static::find();
  }

  /**
   * @return ActiveQuery|ActiveQueryInterface
   */
  public function getProfile()
  {

    return $this->hasOne(UserProfile::className(), ['user_id' => 'id']);
  }



}
