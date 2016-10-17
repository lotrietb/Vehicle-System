<?php

use Illuminate\Database\Seeder;

class VehicleTableSeeder extends Seeder
{
    /**
     * Create a admin user.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicles')->insert([
            'owner_name' => 'Benny',
            'owner_surname' => 'McCarthy',
            'owner_contact_no' => '0813214565',
            'owner_email_address' => 'benny@gmail.com',
            'manufacturer' => 'Opel',
            'type' => 'Corsa',
            'year' => '2004',
            'colour' => 'grey',
            'mileage' => '182300',
            'created_at' => '2016-10-17 20:25:35',
        ]);

    }
}
