<?php

use yii\db\Migration;

/**
 * Class m230114_161029_insert_user
 */
class m230114_161029_insert_user extends Migration
{
  public const TABLE_NAME = '{{%users}}';

  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'username' => 'admin',
        'auth_key' => 'oy2TPoNQ62KtO1MGtoAEhsG8BHoiZF2',
        'password_hash' => '$2y$13$J3uUAMdjAVjjg7XskQDTtOhAX2cAy7.EY6qMkvNKcTO4xBL4xJOd2',
        'password_reset_token' => '$KgsjTYX6ksb3GH59dGRbqeEdpI6rweLg0z4bkoSAXGzGdWVFCWeuC',
        'email' => 'kurt_dc@mail.ru',
        'phones' => '',
        'rememberme' => 1,
        'status' => 10,
        'verification_token' => 'N-jcyjqRZmfDr4kL4-kUZd5BJharC-aK_1568407565',
      ]
    );

    // admin
    // admin
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 2,
        'username' => 'admin',
        'auth_key' => 'oy2TPoNQ62KtO1MGtoAEhsG8B3oiZF2',
        'password_hash' => '$2y$13$Rq3I2qUtmZbKlSeOa8BE7.oDhIFxzoR7Cw1hMxdPlLGH74Mi7nHOu',
        'password_reset_token' => '$KgsjTYX6ksb3GH59dGRbqeEdpI6rweLg0z4bkoSAXGzGdWVFCWeuC',
        'email' => 'admin@mail.ru',
        'phones' => '',
        'rememberme' => 1,
        'status' => 10,
        'verification_token' => 'N-jcyjqRZmfDr4kL2-kUZd5BJharC-aK_1568407565',
      ]
    );

    $this->getDb()->createCommand('ALTER SEQUENCE users_id_seq RESTART WITH 3')->execute();
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
  }
}
