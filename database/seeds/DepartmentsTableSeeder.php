<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create('en_US');
        $limit = 10 ;
        $password = 'secret' ;
        for($i = 0 ; $i < $limit ; $i++){
            DB::table('departments')->insert([
                'name' => $faker->word ,
                'description' => $faker->text ,
            ]);
        }
    }
}
