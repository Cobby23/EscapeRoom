<?php

use yii\db\Migration;

/**
 * Class m220707_143904_remove_status_table
 */
class m220707_143904_remove_status_table extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->dropForeignKey('reservations_ibfk_3', '{{%reservations}}');
    $this->dropTable('{{%status}}');
    $this->alterColumn('{{%reservations}}', 'status_id', 'string');
    $this->renameColumn('{{%reservations}}', 'status_id', 'status');
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    echo "m220707_143904_remove_status_table cannot be reverted.\n";

    return false;
  }

  /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220707_143904_remove_status_table cannot be reverted.\n";

        return false;
    }
    */
}
