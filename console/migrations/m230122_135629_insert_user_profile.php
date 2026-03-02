<?php

use yii\db\Migration;

/**
 * Class m230122_135629_insert_user_profile
 */
class m230122_135629_insert_user_profile extends Migration
{
  public const TABLE_NAME = '{{%user_profile}}';

  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'user_id' => 1,
        'first_name' => 'Сергей',
        'last_name' => 'Мезенцев',
        'phone' => '89269756505',
        'country' => 'Россия',
        'city' => 'Москва',
        'address' => 'г. Москва',
      ],
    );

    $this->getDb()->createCommand('ALTER SEQUENCE user_profile_id_seq RESTART WITH 2')->execute();
  }
}
