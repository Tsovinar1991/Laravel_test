<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<20; $i++) {
            DB::table('posts')->insert([
                'name' => str_random(10),
                'text' => str_random(100)
            ]);
        }
    }
}
