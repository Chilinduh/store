<?php

use yii\db\Migration;

/**
 * Class m230114_135115_create_products
 */
class m230114_135115_create_products extends Migration
{
  public const TABLE_NAME = '{{%products}}';

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
        'code' => $this->string(255)->notNull()->comment('Артикул'),
        'attribute_group_id' => $this->integer()->null()->comment('Группа атрибутов'),
        'brand_id' => $this->integer()->null()->comment('Бренд'),
        'category_id' => $this->integer()->notNull()->comment('Категория'),
        'manufacturer_id' => $this->integer()->null()->comment('Производитель'),
        'packaging_type_id' => $this->integer()->null()->comment('Тип упаковки'),
        'color_id' => $this->integer()->null()->comment('Цвет'),
        'price' => $this->integer()->notNull()->comment('Цена'),
        'show_previous_price' => $this->tinyInteger()->null()->comment('Показать предыдущую цену')->defaultValue(0),
        'weight' => $this->string(255)->notNull()->comment('Вес'),
        'title' => $this->text()->null()->comment('Заголовок'),
        'description' => $this->text()->null()->comment('Описание'),
        'main' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(0),
        'show' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(0),
        'created_at' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата создания'),
        'updated_at' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата изменения'),
        'deleted_at' => $this->dateTime()->defaultValue(null)->comment('Дата удаления'),
      ],
      $tableOptions
    );

  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
