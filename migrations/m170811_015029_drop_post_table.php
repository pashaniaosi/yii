<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `post`.
 */
class m170811_015029_drop_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropTable('post');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'title' => $this->string(12)->notNull()->unique(),
            'body' => $this->text(),
        ]);
    }
}