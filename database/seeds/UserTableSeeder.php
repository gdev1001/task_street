<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 6/23/2015
 * Time: 12:36 PM
 */
use Illuminate\Database\Seeder;
use App\User as users;
use App\Company as company;
use App\Student as student;
use App\Expertise as expertise;


class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('company')->delete();

        DB::table('users')->delete();
        users::create(['id'=>1,'name' =>'Alex','email'=>'shuweiy@uci.edu','password'=>bcrypt('123456'),'isStudent'=>0,'isCompany'=>1]);
        company::create(['user_id' =>1,'id'=>1]);

        users::create(['id'=>2,'name' =>'Isaac Pak','email'=>'ibpak@uci.edu','password'=>bcrypt('Welcome'),'isStudent'=>1,'isCompany'=>0]);
        student::create(['user_id' =>2]);

        users::create(['id'=>3,'name' =>'Duy Bao Nguyen','email'=>'duybn@uci.edu','password'=>bcrypt('Welcome'),'isStudent'=>1,'isCompany'=>0]);
        student::create(['user_id' =>3]);

        users::create(['id'=>4,'name' =>'Vigen Amirkhanyan','email'=>'vamirkha@uci.edu','password'=>bcrypt('Welcome'),'isStudent'=>1,'isCompany'=>0]);
        student::create(['user_id' =>4]);

        users::create(['id'=>5,'name' =>'Shyam Naren Kandala','email'=>'snkandal@uci.edu','password'=>bcrypt('Welcome'),'isStudent'=>1,'isCompany'=>0]);
        student::create(['user_id' =>5]);

        users::create(['id'=>6,'name' =>'wu shan','email'=>'shanwu@uci.edu','password'=>bcrypt('123456'),'isStudent'=>0,'isCompany'=>0,'isExpertise'=>1,'isActive'=>1]);
        expertise::create(['user_id' =>6]);
    }
}
