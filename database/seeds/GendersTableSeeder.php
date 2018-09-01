<?php

use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders = [
        	['name'	=>	'Laki-Laki'],
        	['name'	=>	'Perempuan']
        ];

        DB::table('genders')->insert($genders);

        $this->command->info("Successfully Add Status And Gender");
    }
}
