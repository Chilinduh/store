<?php

use yii\db\Migration;

/**
 * Class m260701_102653_create_feeds_types
 */
class m260701_102653_create_feeds_types extends Migration
{

  public const TABLE_NAME = '{{%feeds_types}}';

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

    $this->execute("CREATE SEQUENCE attributes_feeds_types_id_seq START WITH 1 INCREMENT BY 1;");

    $this->createTable(
      self::TABLE_NAME,
      [
        'id' => $this->primaryKey()->notNull()->defaultValue(new \yii\db\Expression("nextval('attributes_feeds_types_id_seq')")),        
        'name' => $this->string(255)->null()->comment('Название'),        
        'created_at' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата создания')
      ],
      $tableOptions
    );
        $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'name' => 'Яндекс',
      ],
    );

    $this->getDb()->createCommand('ALTER SEQUENCE attributes_feeds_types_id_seq RESTART WITH 2')->execute();
  }

    /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
