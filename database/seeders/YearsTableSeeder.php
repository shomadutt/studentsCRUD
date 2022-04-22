<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class YearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('years')->insert([

            ['year' => '1'],
            ['year' => '2'],
            ['year' => '3'],
            ['year' => '4'],
            ['year' => '5'],
            ['year' => '6'],
            ['year' => '7'],
            ['year' => '8'],
            ['year' => '9'],
            ['year' => '10'],
            ['year' => '11'],
            ['year' => '12'],
            ['year' => '13'],

        ]);
    }
}
