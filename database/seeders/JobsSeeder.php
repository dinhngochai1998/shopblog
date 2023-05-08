<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Facades\DB;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $faker = new Illuminate\Database\Eloquent\Factories\Factory();

        $limit = 100;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('test_jobs')->insert([
                                           'name' => 'hai',
                                           'email' => 'haidn@gmail.com',
                                           'phone' => 31231312,
                                           'send_type' => 'email',
                                           'status' => 'pending'
                                       ]);
        }
    }
}
