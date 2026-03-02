<?php

use yii\db\Migration;

/**
 * Class m231212_150300_create_employee
 */
class m231212_150300_create_employee extends Migration
{

  public const TABLE_NAME = '{{%employee}}';
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
        'name' => $this->string(50)->null()->comment('Имя'),
        'first_name' => $this->string(255)->null()->comment('Фамилия'),
        'last_name' => $this->string(255)->null()->comment('Отчество'),
        'phone' => $this->string(255)->notNull()->comment('Телефон'),
        'email' => $this->string(255)->notNull()->comment('Email'),
        'birthdate' => $this->dateTime()->defaultValue(null)->comment('Дата рождения'),
        'show' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(1),
        'created_at' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата создания'),
        'deleted_at' => $this->dateTime()->defaultValue(null)->comment('Дата удаления')
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
