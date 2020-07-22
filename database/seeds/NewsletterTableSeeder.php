<?php

use Illuminate\Database\Seeder;

class NewsletterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $faker = Faker\Factory::create();

    for($i = 0; $i < 1000; $i++) {
        App\Newsletter::create([
            
            'email' => $faker->email,
        ]);
    }
    }
}
