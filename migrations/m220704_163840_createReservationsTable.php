<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reservations}}`.
 */
class m220704_163840_createReservationsTable extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->createTable('{{%reservations}}', [
      'id' => $this->primaryKey(),
      'room_id' => $this->integer()->notNull(),
      'user_id' => $this->integer()->notNull(),
      'start_time' => $this->date()->notNull(),
      'status_id' => $this->integer()->notNull(),
    ]);

    $this->addForeignKey('reservations_ibfk_1', '{{%reservations}}', 'room_id', '{{%rooms}}', 'id', 'RESTRICT', 'RESTRICT');
    $this->addForeignKey('reservations_ibfk_2', '{{%reservations}}', 'user_id', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable('{{%reservations}}');
  }
}
