<?php

use yii\db\Migration;

/**
 * Class m230226_124240_create_faq
 */
class m230226_124240_create_faq extends Migration
{
  public const TABLE_NAME = '{{%faq}}';

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
        'title' => $this->text()->null()->comment('Заголовок'),
        'text' => $this->text()->null()->comment('Описание'),
        'show' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(0)
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
