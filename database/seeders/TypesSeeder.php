<?php

namespace Database\Seeders;

use App\Models\type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types =['PHP','Js','HTML/CSS','Laravel','VueJs','Vite'];
        foreach($types as $type){
            $new_type = new type();
            $new_type->type = $type;
            $new_type->save();
        }
    }
}
