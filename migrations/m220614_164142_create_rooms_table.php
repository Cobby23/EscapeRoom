<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rooms}}`.
 */
class m220614_164142_create_rooms_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->createTable('{{%rooms}}', [
        'id' => $this->primaryKey(),
        'name' => $this->string()->notNull(),
        'complexity' => $this->float(),
        'max_time' => $this->float()->notNull(),
        'max_players' => $this->integer(),
      ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rooms}}');
    }
}
