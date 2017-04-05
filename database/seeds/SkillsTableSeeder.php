<?php

use Illuminate\Database\Seeder;
use App\skill as skill;


class SkillsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('skills');

        skill::insert(
        	[ 
        	  array('name' => 'Java'),
        	  array('name' => 'Html'),
        	  array('name' => 'Mysql'),
        	  array('name' => 'C'),
        	  array('name' => 'Javascript'),
        	  array('name' => 'Python'),
        	  array('name' => 'Ruby'),
			array('name' => 'PHP')

        	]
		);
    }

}



