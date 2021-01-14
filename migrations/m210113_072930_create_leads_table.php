<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%leads}}`.
 */
class m210113_072930_create_leads_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $tableOptions = null;

	    if ($this->db->driverName === 'mysql') {
		    $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
	    }

        $this->createTable('{{%leads}}', [
            'id' => $this->primaryKey(),
	        'name' => $this->string()->notNull(),
	        'source_id' => $this->integer()->notNull(),
	        'status' => $this->integer()->notNull(),
	        'created_at' => $this->integer(11)->notNull(),
	        'created_by' => $this->integer()->notNull()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%leads}}');
    }
}
