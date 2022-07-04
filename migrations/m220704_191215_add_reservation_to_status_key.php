<?php

use yii\db\Migration;

/**
 * Class m220704_191215_add_reservation_to_status_key
 */
class m220704_191215_add_reservation_to_status_key extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->addForeignKey('reservations_ibfk_3', '{{%reservations}}', 'status_id', '{{%status}}', 'id', 'RESTRICT', 'RESTRICT');
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropForeignKey('reservations_ibfk_3', '{{%reservations}}');
  }

  /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220704_191215_add_reservation_to_status_key cannot be reverted.\n";

        return false;
    }
    */
}
