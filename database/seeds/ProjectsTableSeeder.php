<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create('en_GB');
        $limit = 10 ;
        $password = 'secret' ;
        for($i = 0 ; $i < $limit ; $i++){
            DB::table('projects')->insert([
                'project_name' => $faker->word ,
                'start_date' => $faker->time($format = 'Y:m:d',$max = 'now'),
                'end_date' => $faker->time($format = 'Y:m:d',$min = 'now'),
                'description' => $faker->text ,
                'user_id' => 1 ,
            ]);
        }
    }
}
