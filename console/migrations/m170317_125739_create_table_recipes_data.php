<?php

use yii\db\Migration;

class m170317_125739_create_table_recipes_data extends Migration
{
    public function up()
    {
        $this->createTable('recipes_data', [
            'id'           => $this->primaryKey(),
            'recipeId'     => $this->integer()->notNull(),
            'ingredientId' => $this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        echo "m170317_125739_create_table_recipes_data cannot be reverted.\n";

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
