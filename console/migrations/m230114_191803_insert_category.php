<?php

use yii\db\Migration;

/**
 * Class m230114_191803_insert_category
 */
class m230114_191803_insert_category extends Migration
{

  public const TABLE_NAME = '{{%category}}';

  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 10,
        'root' => 6,
        'lft' => 2,
        'rgt' => 3,
        'lvl' => 1,
        'name' => 'Розетки и выключатели',
        'icon' => '',
        'icon_type' => 1,
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 13,
        'root' => 5,
        'lft' => 9,
        'rgt' => 10,
        'lvl' => 2,
        'name' => 'Дрели и шуруповерты',
        'icon' => '',
        'icon_type' => 1,
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 14,
        'root' => 5,
        'lft' => 11,
        'rgt' => 12,
        'lvl' => 3,
        'name' => 'Компрессорное оборудование и аксессуары',
        'icon' => '',
        'icon_type' => 1,
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 17,
        'root' => 7,
        'lft' => 3,
        'rgt' => 4,
        'lvl' => 2,
        'name' => 'Смесители и комплектующие',
        'icon' => '',
        'icon_type' => 1,
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 18,
        'root' => 7,
        'lft' => 5,
        'rgt' => 6,
        'lvl' => 2,
        'name' => 'Душевое оборудование',
        'icon' => '',
        'icon_type' => 1,
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 15,
        'root' => 7,
        'lft' => 2,
        'rgt' => 9,
        'lvl' => 1,
        'name' => 'Смесители и душевое оборудование',
        'icon' => '',
        'icon_type' => 1,
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 16,
        'root' => 7,
        'lft' => 7,
        'rgt' => 8,
        'lvl' => 2,
        'name' => 'Мебель для ванной комнаты',
        'icon' => '',
        'icon_type' => 1,
      ]
    );


    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 12,
        'root' => 5,
        'lft' => 5,
        'rgt' => 6,
        'lvl' => 2,
        'name' => 'Малярный инструмент',
        'icon' => '',
        'icon_type' => 1,
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 8,
        'root' => 5,
        'lft' => 2,
        'rgt' => 7,
        'lvl' => 1,
        'name' => 'Верхняя одежда',
        'icon' => '',
        'icon_type' => 1,
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 9,
        'root' => 5,
        'lft' => 8,
        'rgt' => 13,
        'lvl' => 1,
        'name' => 'Футболки',
        'icon' => '',
        'icon_type' => 1,
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 23,
        'root' => 5,
        'lft' => 15,
        'rgt' => 16,
        'lvl' => 2,
        'name' => 'Электроинструмент',
        'icon' => '',
        'icon_type' => 1,
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 25,
        'root' => 5,
        'lft' => 19,
        'rgt' => 20,
        'lvl' => 2,
        'name' => 'Плита OSB',
        'icon' => '',
        'icon_type' => 1,
      ]
    );


    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 11,
        'root' => 5,
        'lft' => 3,
        'rgt' => 4,
        'lvl' => 2,
        'name' => 'Измерительный инструмент',
        'icon' => '',
        'icon_type' => 1,
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 5,
        'root' => 5,
        'lft' => 1,
        'rgt' => 22,
        'lvl' => 0,
        'name' => 'Одежда',
        'icon' => '',
        'icon_type' => 1,
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 6,
        'root' => 6,
        'lft' => 1,
        'rgt' => 4,
        'lvl' => 0,
        'name' => 'Электрика',
        'icon' => '',
        'icon_type' => 1,
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 7,
        'root' => 7,
        'lft' => 1,
        'rgt' => 10,
        'lvl' => 0,
        'name' => 'Сантехника',
        'icon' => '',
        'icon_type' => 1,
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 19,
        'root' => 19,
        'lft' => 1,
        'rgt' => 2,
        'lvl' => 0,
        'name' => 'Инженерные системы',
        'icon' => '',
        'icon_type' => 1,
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 20,
        'root' => 20,
        'lft' => 1,
        'rgt' => 2,
        'lvl' => 0,
        'name' => 'Интерьер и отделка',
        'icon' => '',
        'icon_type' => 1,
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 21,
        'root' => 21,
        'lft' => 1,
        'rgt' => 2,
        'lvl' => 0,
        'name' => 'Крепеж',
        'icon' => '',
        'icon_type' => 1,
      ]
    );

    $this->getDb()->createCommand('ALTER SEQUENCE category_id_seq RESTART WITH 1')->execute();

  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
  }
}
