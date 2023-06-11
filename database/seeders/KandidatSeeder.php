<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class KandidatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $gender = $faker->randomElement(['Laki-laki', 'Perempuan']);

    	for($i = 1; $i <= 20; $i++){

    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('kandidats')->insert([
    			'nama' => $faker->name,
                'jenisKelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'alamat' => $faker->address,
                'noHp' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'komunikasi' => $faker->numberBetween(0,40),
    			'kerjasama' => $faker->numberBetween(0,40),
    			'kejujuran' => $faker->numberBetween(0,40),
    			'interpersonal' => $faker->numberBetween(0,40),
                'created_at' => $faker->date('Y-m-d', 'now')
    		]);
        }
    }
}
