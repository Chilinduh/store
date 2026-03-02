<?php

use yii\db\Migration;

/**
 * Class m230429_073620_create_pages
 */
class m230429_073620_create_pages extends Migration
{

  public const TABLE_NAME = '{{%pages}}';

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
        'text' => $this->text()->null()->comment('Описание'),
        'url' => $this->string(255)->null()->comment('Адрес страницы'),
        'show' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(1),
      ],
      $tableOptions
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'name' => 'Главная',
        'url' => '/',
      ],
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 2,
        'name' => 'Новости',
        'url' => '/news',
      ],
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 3,
        'name' => 'Каталог',
        'url' => '/catalog',
      ],
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 4,
        'name' => 'Доставка',
        'url' => '/delivery',
      ],
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 5,
        'name' => 'Контакты',
        'url' => '/contacts',
      ],
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 6,
        'name' => 'О нас',
        'url' => '/about',
      ],
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 7,
        'name' => 'Вопросы и ответы',
        'url' => '/faqs',
      ],
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 8,
        'name' => 'Условия и соглашения',
        'url' => '/terms',
      ],
    );

    $this->getDb()->createCommand('ALTER SEQUENCE pages_id_seq RESTART WITH 9')->execute();
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
