<?php

namespace app\migrations;

use yii\db\Migration;

class M170811051427CreateUserTable extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "M170811051427CreateUserTable cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "M170811051427CreateUserTable cannot be reverted.\n";

        return false;
    }
    */
}
