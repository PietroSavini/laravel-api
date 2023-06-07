<?php

namespace Database\Seeders;

use App\Models\Project;
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
        $classes=['PHP','Js','HTML/CSS','Laravel','VueJs','Vite'];
        
        for($i = 0; $i < 10 ; $i++){
            $class= array_rand($classes);
            $project = new Project();
            $project->title = $classes[$class] . ' -- ' . $faker->sentence(3);
            $project->description = $faker->text(100);
            $project->slug = Str::slug($project->title, '-');
            $project->save();
        }
    }
}
