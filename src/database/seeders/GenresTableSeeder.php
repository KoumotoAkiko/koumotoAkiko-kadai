<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names=[
            ['name'=>'カメラ'],
            ['name'=>'パソコン'],
            ['name'=>'家電'],
            ['name'=>'時計'],
            ['name'=>'衣料品'],
        ];
        foreach($names as $name){
            DB::table('genres')->insert(['name'=>$name]);
        }
    }

}