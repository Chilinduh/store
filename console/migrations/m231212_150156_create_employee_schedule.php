<?php

use yii\db\Migration;

/**
 * Class m231212_150156_create_employee_schedule
 */
class m231212_150156_create_employee_schedule extends Migration
{

  public const TABLE_NAME = '{{%employee_schedule}}';
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
        'employee_id' => $this->integer()->notNull()->comment('ID сотрудника'),
        'date' => $this->string(255)->defaultValue(null)->comment('Дата'),
        'hours' => $this->string(10)->null()->comment('Показать/скрыть')->defaultValue(0),
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
