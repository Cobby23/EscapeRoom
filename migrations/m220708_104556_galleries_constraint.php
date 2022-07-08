<?php

use yii\db\Migration;

/**
 * Class m220708_104556_galleries_constraint
 */
class m220708_104556_galleries_constraint extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->dropForeignKey('galleries_ibfk_1', '{{%galleries}}');
    $this->addForeignKey('galleries_ibfk_1', '{{%galleries}}', 'room_id', '{{%rooms}}', 'id', 'CASCADE', 'CASCADE');

    $this->dropForeignKey('images_ibfk_1', '{{%images}}');
    $this->addForeignKey('images_ibfk_1', '{{%images}}', 'gallery_id', '{{%galleries}}', 'id', 'CASCADE', 'CASCADE');
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    echo "m220708_104556_galleries_constraint cannot be reverted.\n";

    return false;
  }

  /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220708_104556_galleries_constraint cannot be reverted.\n";

        return false;
    }
    */
}
