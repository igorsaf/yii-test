<?php

use app\models\Lead;
use Faker\Factory;
use yii\db\Migration;

/**
 * Class m210114_121851_fill_leads_table
 */
class m210114_121851_fill_leads_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $faker = Faker\Factory::create();

		for ($i = 0; $i < 100; $i ++) {
			$lead = new Lead();

			$lead->detachBehaviors();

			$lead->name = $faker->words($faker->numberBetween(4, 8), true);
			$lead->source_id = $faker->numberBetween(1, 10);
			$lead->status = $faker->numberBetween(1, 5);
			$lead->created_at = $faker->dateTime()->getTimestamp();
			$lead->created_by = $faker->numberBetween(100, 101);

			$lead->save();
		}
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210114_121851_fill_leads_table cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210114_121851_fill_leads_table cannot be reverted.\n";

        return false;
    }
    */
}
