<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
use App\Surat;

class SuratsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::today();

        $faker = Faker::create();

        for ($i=0; $i < 5; $i++) { 
            Surat::create([
            'surat_type_id' => rand(1,3),
            'sender_id' => 1,
            'letter_date' => $now,
            'send_date' => $now->addDay(),
            'number' => strtoupper(str_random(5).'12345'),
            'subject' => $faker->sentence,
            'summary' => $faker->paragraph,
            ]);
        }
        $this->command->info('Create Surat!');
    }
}
