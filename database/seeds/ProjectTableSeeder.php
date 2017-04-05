<?php

use Illuminate\Database\Seeder;
use App\project as project;

class ProjectTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('project');

        project::create(['company_id'=>'1','name' => 'JPEG Manipulator','status' => 'Open','description' => '<p>JPEG is a format of image. We need to create a desktop program to allow user do following actions:</p><ul><li>Open a JPEG</li><li>Rotate a JPEG</li><li>Flip a JPEG</li><li>Save (Save as) a JPEG</li></ul><p>Rotation and flip needs to be lossless in quality. For example, if you rotate a JPEG 90 degree for 4 rounds, the newly saved JPEG file should be exactly the same with the original JPEG file.</p>','skills' => 'JavaScript php ;', 'environment' => 'You can choose C++, Java, or C#, whichever one you prefer, to develop the desktop application. Here are some recommended IDEs:
                            C++: Visual Studio
                            Java: Eclipse, NetBean
                                C#: Visual Studio','id'=>20000]);
	    }

}



