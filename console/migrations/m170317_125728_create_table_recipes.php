<?php

use yii\db\Migration;

class m170317_125728_create_table_recipes extends Migration
{
    public function up()
    {
        $this->createTable('recipes', [
            'id'     => $this->primaryKey(),
            'name'   => $this->string(255)->unique()->notNull(),
            'status' => $this->integer()->defaultValue(1),
        ]);
    }

    public function down()
    {
        echo "m170317_125728_create_table_recipes cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
