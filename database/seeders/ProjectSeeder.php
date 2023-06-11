<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   

       
        
        for($i = 0; $i < 10 ; $i++){
            $types= rand(1,6);
            $project = new Project();
            $project->title =  $faker->sentence(3);
            $project->description = $faker->text(100);
            $project->slug = Str::slug($project->title, '-');
            $project->type_id = $types;
            $project->save();
        }
    }
}
