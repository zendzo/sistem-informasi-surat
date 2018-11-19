<?php

use Illuminate\Database\Seeder;
use App\SuratType;

class SuratTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Nota Dinas','Surat Persetujuan','Surat Izin Cuti'];

        foreach ($types as $type) {
            SuratType::create([
                'kode' => strtoupper(str_random(4)),
                'name' => $type
                ]);
        }

        $this->command->info('Create Type Surat!');
    }
}
