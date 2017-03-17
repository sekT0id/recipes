<?php

use yii\db\Migration;

class m170317_125717_create_table_ingredients extends Migration
{
    public function up()
    {
        $this->createTable('ingredients', [
            'id'     => $this->primaryKey(),
            'name'   => $this->string(255)->unique()->notNull(),
            'status' => $this->integer()->defaultValue(1),
        ]);
    }

    public function down()
    {
        echo "m170317_125717_create_table_ingredients cannot be reverted.\n";

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
