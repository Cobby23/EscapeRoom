<?php

use yii\db\Migration;

/**
 * Class m220707_201537_split_reservation_date_and_time
 */
class m220707_201537_split_reservation_date_and_time extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->renameColumn('{{%reservations}}', 'start_time', 'date');
    $this->addColumn('{{%reservations}}', 'hour', 'float');
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    echo "m220707_201537_split_reservation_date_and_time cannot be reverted.\n";

    return false;
  }

  /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220707_201537_split_reservation_date_and_time cannot be reverted.\n";

        return false;
    }
    */
}
