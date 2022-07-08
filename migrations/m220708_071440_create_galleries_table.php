<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%galleries}}`.
 */
class m220708_071440_create_galleries_table extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->createTable('{{%galleries}}', [
      'id' => $this->primaryKey(),
      'room_id' => $this->integer()->notNull(),
    ]);
    $this->addForeignKey('galleries_ibfk_1', '{{%galleries}}', 'room_id', '{{%rooms}}', 'id', 'RESTRICT', 'RESTRICT');
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable('{{%galleries}}');
  }
}
