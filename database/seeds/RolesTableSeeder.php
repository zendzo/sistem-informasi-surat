<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = config('role');

        foreach ($role as $name) {
            Role::create([
                'name' => $name
            ]);
        }

        $this->command->info('User Roles Created !');
    }
}
