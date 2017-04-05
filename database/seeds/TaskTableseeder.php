<?php

use Illuminate\Database\Seeder;
use App\task as task;


class TaskTableSeeder extends Seeder{

    public function run(){

        DB::table('tasks')->delete();

        $task = task::create(['name'=> 'Data Fetching', 'description' => 'The purpose of the Data Fetching module is to wrap basic Github commands into commands that can be used by shokse. The wrapper is an abstraction of the original Github commands that is more instinctive and effective for this project to use.
                        .','input'=>'Use the a Github account to implement your code: Username:ShokseTest Access Token: e814bdd9ae716d62196df1ae9bff1f6a413ddf63 Use the access token to access the API such as:GET https://api.github.com/user?access_token=e814bdd9ae716d62196df1ae9bff1f6a413ddf63
',
                          'output'=>'Set of functions which is an abstraction of the original Github commands that is more instinctive and effective for this project to use.',
                            'estimateTime'=>5,'sequence'=>'1','project_id'=>20000,'id'=>100000] );

        $task->skill()->attach(8);
        $task->skill()->attach(2);


        $task= task::create(['name'=> 'Tree view', 'description' => 'The purpose of this module is to better visualize the progress of a certain project through a tree structure. You will see a json file containing key-value pairs. The key is either a filename or a directory name and the value is the corresponding text or directory information.
                    .','output'=>'Generate a  treeview (expandable) of the whole repository (input as a json file). #Every entry in the tree view should be clickable and reference to href=“#PATH/TO/ENTRY”.
                    ','input'=>'The input json file stores two types of entries. The file entry stores the mapping between the file name and its text content. The directory entry stores the mapping between the directory name and its corresponding contents that can have both subdirectories and files.
                    {“Directory Name”:{subdirectory content}, “File Name”:”base64 encoded content”}
                    ','estimateTime'=>5,'sequence'=>'1','project_id'=>20000] );

        $task->skill()->attach(2);
        $task->skill()->attach(5);

        $task= task::create(['name'=> 'Tree view', 'description' => 'The purpose of this module is to better visualize the progress of a certain project through a tree structure. You will see a json file containing key-value pairs. The key is either a filename or a directory name and the value is the corresponding text or directory information.
                    .','output'=>'Generate a  treeview (expandable) of the whole repository (input as a json file). #Every entry in the tree view should be clickable and reference to href=“#PATH/TO/ENTRY”.
                    ','input'=>'The input json file stores two types of entries. The file entry stores the mapping between the file name and its text content. The directory entry stores the mapping between the directory name and its corresponding contents that can have both subdirectories and files.
                    {“Directory Name”:{subdirectory content}, “File Name”:”base64 encoded content”}
                    ','estimateTime'=>5,'sequence'=>'1','project_id'=>20000] );

        $task->skill()->attach(2);
        $task->skill()->attach(5);



        $task= task::create(['name'=> 'Show content by Ajax', 'description' => 'The purpose of this module is to better visualize the progress of a certain project through asynchronous content loading. You will see a json file containing key-value pairs. The key is either a filename or a directory name and the value is the corresponding text or directory information.
                    ','output'=>'Generate a HTML file of the flat view of the repository. Every entry (file or directory) should have an id that is same as their paths (“PATH/TO/ENTRY”). To save memory and time, the website only loads contents upon users clicking corresponding session. This can be done using Ajax.
                    ','input'=>'The input json file stores two types of entries. The file entry stores the mapping between the file name and its text content. The directory entry stores the mapping between the directory name and its corresponding contents that can have both subdirectories and files.
                    {“Directory Name”:{subdirectory content}, “File Name”:”base64 encoded content”}','estimateTime'=>5,'sequence'=>'1','project_id'=>20000] );

        $task->skill()->attach(2);
        $task->skill()->attach(5);
        $task->skill()->attach(8);


        $task= task::create(['name'=> 'Project Management', 'description' => 'The purpose of the project management module is to build a module which allow the third party users to call functions to assist their project management tasks by using the function from API.
                    ','input'=>'Shokes’backend database of user information and Shokse Git Api documentation ','output'=>'Set of functions wihch assists projects management tasks by using the function from API','estimateTime'=>5,'sequence'=>'1','project_id'=>20000] );

        $task->skill()->attach(8);
        $task->skill()->attach(5);

        DB::table('rank')->delete();
//        App\rank::create(['user_id' => 1,'task_id'=>3,'skills'=>'java','overall_point' => 1000]);


    }





}

