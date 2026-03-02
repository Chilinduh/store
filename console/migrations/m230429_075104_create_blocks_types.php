<?php

use yii\db\Migration;

/**
 * Class m230429_075104_create_blocks_types
 */
class m230429_075104_create_blocks_types extends Migration
{
  public const TABLE_NAME = '{{%blocks_types}}';

  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $tableOptions = null;

    $table = Yii::$app->db->schema->getTableSchema(self::TABLE_NAME);
    if (null !== $table) {
      $this->dropTable(self::TABLE_NAME);
    }

    $this->createTable(
      self::TABLE_NAME,
      [
        'id'   => $this->primaryKey(),
        'name' => $this->string(255)->notNull()->comment('Наименование'),
        'description' => $this->string(255)->null()->comment('Описание'),
        'show' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(1),
      ],
      $tableOptions
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'name' => 'Блок с товарами (Распродажа)',

      ],
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 2,
        'name' => 'Блок с товарами (Новинка)',
      ],
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 3,
        'name' => 'Блок с товарами (Горячее предложение)',
      ],
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 4,
        'name' => 'Блок с товарами (Лучшее предложение)',
      ],
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 5,
        'name' => 'Блок с товарами (Лучшее предложение)',
      ],
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 6,
        'name' => 'Баннер (левый)',
      ],
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 7,
        'name' => 'Баннер (правый)',
      ],
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 8,
        'name' => 'Блок с категориями',
      ],
    );

    $this->getDb()->createCommand('ALTER SEQUENCE blocks_types_id_seq RESTART WITH 9')->execute();

  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
