<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
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
            DB::table('users')->insert([
                'name' => $faker->name ,
                'email' => $faker->unique()->email ,
                'user_name' => $faker->unique()->name ,
                'password' => Hash::make($password) ,
                'mobile' => $faker->mobileNumber() ,
            ]);
        }
    }
}
