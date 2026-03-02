<?php

use yii\db\Migration;

/**
 * Class m230114_194037_insert_admin_menu
 */
class m230114_202938_insert_admin_menu extends Migration
{
  public const TABLE_NAME = '{{%admin_menu}}';

  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 5,
        'root' => 2,
        'lft' => 2,
        'rgt' => 3,
        'lvl' => 1,
        'name' => 'Категории товаров',
        'icon' => '',
        'icon_type' => 1,
        'url' => 'category',
        'active' => true,
        'selected' => false,
        'disabled' => false,
        'readonly' => false,
        'visible' => true,
        'collapsed' => false,
        'movable_u' => true,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 6,
        'root' => 2,
        'lft' => 4,
        'rgt' => 5,
        'lvl' => 1,
        'name' => 'Товары',
        'icon' => '',
        'icon_type' => 1,
        'url' => 'products',
        'selected' => false,
        'disabled' => false,
        'readonly' => false,
        'visible' => true,
        'collapsed' => false,
        'movable_u' => true,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 7,
        'root' => 1,
        'lft' => 2,
        'rgt' => 3,
        'lvl' => 1,
        'name' => 'Бренд',
        'icon' => '',
        'icon_type' => 1,
        'url' => 'brands',
        'selected' => false,
        'disabled' => false,
        'readonly' => false,
        'visible' => true,
        'collapsed' => false,
        'movable_u' => true,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 9,
        'root' => 4,
        'lft' => 2,
        'rgt' => 3,
        'lvl' => 1,
        'name' => 'Заказы',
        'icon' => '',
        'icon_type' => 1,
        'url' => 'orders',
        'selected' => false,
        'disabled' => false,
        'readonly' => false,
        'visible' => true,
        'collapsed' => false,
        'movable_u' => true,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 10,
        'root' => 1,
        'lft' => 6,
        'rgt' => 7,
        'lvl' => 1,
        'name' => 'Статусы заказов',
        'icon' => '',
        'icon_type' => 1,
        'url' => 'order-status',
        'selected' => false,
        'disabled' => false,
        'readonly' => false,
        'visible' => true,
        'collapsed' => false,
        'movable_u' => true,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 8,
        'root' => 1,
        'lft' => 4,
        'rgt' => 5,
        'lvl' => 1,
        'name' => 'Меню',
        'icon' => '',
        'icon_type' => 1,
        'url' => 'menu',
        'selected' => false,
        'disabled' => false,
        'readonly' => false,
        'visible' => true,
        'collapsed' => false,
        'movable_u' => true,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 11,
        'root' => 1,
        'lft' => 8,
        'rgt' => 9,
        'lvl' => 1,
        'name' => 'Цвета',
        'icon' => '',
        'icon_type' => 1,
        'url' => 'colors',
        'selected' => false,
        'disabled' => false,
        'readonly' => false,
        'visible' => true,
        'collapsed' => false,
        'movable_u' => true,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 4,
        'root' => 4,
        'lft' => 1,
        'rgt' => 6,
        'lvl' => 0,
        'name' => 'Клиенты',
        'icon' => '',
        'icon_type' => 1,
        'url' => 'category',
        'selected' => false,
        'disabled' => false,
        'readonly' => false,
        'visible' => true,
        'collapsed' => false,
        'movable_u' => true,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 12,
        'root' => 4,
        'lft' => 4,
        'rgt' => 5,
        'lvl' => 1,
        'name' => 'Пользователи',
        'icon' => '',
        'icon_type' => 1,
        'url' => 'user',
        'selected' => false,
        'disabled' => false,
        'readonly' => false,
        'visible' => true,
        'collapsed' => false,
        'movable_u' => true,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 3,
        'root' => 3,
        'lft' => 1,
        'rgt' => 2,
        'lvl' => 0,
        'name' => 'Настройки',
        'icon' => '',
        'icon_type' => 1,
        'url' => 'settings',
        'selected' => false,
        'disabled' => false,
        'readonly' => false,
        'visible' => true,
        'collapsed' => false,
        'movable_u' => true,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 13,
        'root' => 1,
        'lft' => 10,
        'rgt' => 11,
        'lvl' => 1,
        'name' => 'Города',
        'icon' => '',
        'icon_type' => 1,
        'url' => 'city',
        'selected' => false,
        'disabled' => false,
        'readonly' => false,
        'visible' => true,
        'collapsed' => false,
        'movable_u' => true,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 14,
        'root' => 1,
        'lft' => 12,
        'rgt' => 13,
        'lvl' => 1,
        'name' => 'Производители',
        'icon' => '',
        'icon_type' => 1,
        'url' => 'manufacturers',
        'selected' => false,
        'disabled' => false,
        'readonly' => false,
        'visible' => true,
        'collapsed' => false,
        'movable_u' => true,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 15,
        'root' => 1,
        'lft' => 14,
        'rgt' => 15,
        'lvl' => 1,
        'name' => 'Поисковые слова',
        'icon' => '',
        'icon_type' => 1,
        'url' => 'search-words',
        'selected' => false,
        'disabled' => false,
        'readonly' => false,
        'visible' => true,
        'collapsed' => false,
        'movable_u' => true,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 16,
        'root' => 1,
        'lft' => 16,
        'rgt' => 17,
        'lvl' => 1,
        'name' => 'Свойства товаров',
        'icon' => '',
        'icon_type' => 1,
        'url' => 'property',
        'selected' => false,
        'disabled' => false,
        'readonly' => false,
        'visible' => true,
        'collapsed' => false,
        'movable_u' => true,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 2,
        'root' => 2,
        'lft' => 1,
        'rgt' => 8,
        'lvl' => 0,
        'name' => 'Каталог',
        'icon' => '',
        'icon_type' => 1,
        'url' => 'products',
        'selected' => false,
        'disabled' => false,
        'readonly' => false,
        'visible' => true,
        'collapsed' => false,
        'movable_u' => true,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 17,
        'root' => 2,
        'lft' => 6,
        'rgt' => 7,
        'lvl' => 1,
        'name' => 'Товары на складе',
        'icon' => '',
        'icon_type' => 1,
        'url' => 'product-stock',
        'selected' => false,
        'disabled' => false,
        'readonly' => false,
        'visible' => true,
        'collapsed' => false,
        'movable_u' => true,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'root' => 1,
        'lft' => 1,
        'rgt' => 20,
        'lvl' => 0,
        'name' => 'Справочники',
        'icon' => '',
        'icon_type' => 1,
        'url' => '',
        'selected' => false,
        'disabled' => false,
        'readonly' => false,
        'visible' => true,
        'collapsed' => false,
        'movable_u' => true,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 18,
        'root' => 1,
        'lft' => 18,
        'rgt' => 19,
        'lvl' => 1,
        'name' => 'Размеры',
        'icon' => '',
        'icon_type' => 1,
        'url' => 'sizes',
        'selected' => false,
        'disabled' => false,
        'readonly' => false,
        'visible' => true,
        'collapsed' => false,
        'movable_u' => true,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 19,
        'root' => 4,
        'lft' => 6,
        'rgt' => 7,
        'lvl' => 1,
        'name' => 'Заказы СДЕК',
        'icon' => '',
        'icon_type' => 1,
        'url' => 'orders-cdek',
        'selected' => true,
        'disabled' => false,
        'readonly' => false,
        'visible' => false,
        'collapsed' => true,
        'movable_u' => true,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 20,
        'root' => 1,
        'lft' => 22,
        'rgt' => 23,
        'lvl' => 1,
        'name' => 'Единицы измерения',
        'icon' => '',
        'icon_type' => 1,
        'url' => 'units',
        'selected' => true,
        'disabled' => false,
        'readonly' => false,
        'visible' => false,
        'collapsed' => true,
        'movable_u' => false,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 21,
        'root' => 21,
        'lft' => 2,
        'rgt' => 3,
        'lvl' => 1,
        'name' => 'Новости',
        'icon' => '',
        'icon_type' => 1,
        'url' => 'news',
        'selected' => true,
        'disabled' => false,
        'readonly' => false,
        'visible' => false,
        'collapsed' => true,
        'movable_u' => false,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 22,
        'root' => 21,
        'lft' => 1,
        'rgt' => 6,
        'lvl' => 0,
        'name' => 'Публикации',
        'icon' => '',
        'icon_type' => 1,
        'url' => '',
        'selected' => true,
        'disabled' => false,
        'readonly' => false,
        'visible' => false,
        'collapsed' => true,
        'movable_u' => false,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 23,
        'root' => 21,
        'lft' => 4,
        'rgt' => 5,
        'lvl' => 1,
        'name' => 'Категории новостей',
        'icon' => '',
        'icon_type' => 1,
        'url' => 'news-category',
        'selected' => true,
        'disabled' => false,
        'readonly' => false,
        'visible' => false,
        'collapsed' => true,
        'movable_u' => false,
        'movable_d' => true,
        'movable_l' => true,
        'movable_r' => true,
        'removable' => true,
        'removable_all' => false,
        'child_allowed' => true
      ]
    );

    $this->getDb()->createCommand('ALTER SEQUENCE admin_menu_id_seq RESTART WITH 24')->execute();

  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
  }
}
