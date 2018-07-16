<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     * */
    public function run() {
//    $faker = Faker\Factory::create();
//
//          for($i = 0; $i < 1000; $i++) {
//                  App\Car::create([
//                'name' => $faker->name,
//                 'model' => $faker->randomDigit,
//                'chasis' => $faker->unique()->numberBetween($min = 1000, $max = 9000),
//                      'grade' => $faker->randomDigit,
//                      'manuFactureyear' => $faker->randomDigit,
//                      'purchasingprice'=> $faker->randomDigit,
//                    'to'=> $faker->name,
//                    'from'=> $faker->name,
//                    'expense'=> $faker->randomDigit
//    ]);
//    }


//        $faker = Faker\Factory::create();
        App\User::create([
            'name' => 'Osama Inayat',
            'email'=> 'rajaosamainayat@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }

}
