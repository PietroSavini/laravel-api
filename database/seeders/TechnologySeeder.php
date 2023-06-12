<?php

namespace Database\Seeders;

use App\Models\technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies =['Front-end','Back-end','Full-stack','web development','WebApp','MobileApp'];
        foreach($technologies as $technology){
            $new_technology = new technology();
            $new_technology->name = $technology;
            $new_technology->save();
        }
    }
}
