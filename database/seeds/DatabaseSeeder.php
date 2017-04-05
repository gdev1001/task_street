<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();


        $this->call('UserTableSeeder');
        $this->command->info('User table seeded!');
     
        $this->call('ProjectTableSeeder');
        $this->command->info('Project table seeded!');

		$this->call('SkillsTableSeeder');
		$this->command->info('Skill table seeded!');

		$this->call('TaskTableSeeder');
		$this->command->info('Task table seeded!');


		$this->call('WikiSeeder.php');
		$this->command->info('Wiki table seeded!');

		Model::reguard();

	}
}