<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%images}}`.
 */
class m220708_071826_create_images_table extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->createTable('{{%images}}', [
      'id' => $this->primaryKey(),
      'gallery_id' => $this->integer()->notNull(),
      'path' => $this->string(),
    ]);
    $this->addForeignKey('images_ibfk_1', '{{%images}}', 'gallery_id', '{{%galleries}}', 'id', 'RESTRICT', 'RESTRICT');
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable('{{%images}}');
  }
}
