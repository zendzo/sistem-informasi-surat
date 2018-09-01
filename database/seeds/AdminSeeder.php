<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;

        User::create([
        	'first_name' => 'Administrator',
	        'last_name' => 'System',
            'email' => 'admin@admin.com',
            'gender_id' => 1,
            'birth_date' => '12/09/1992',
	        'phone' => env('CUSTOMER_TEST_PHONENUMBER'),
	        'password' => 'adminadmin',
	        'role_id' => 1,
        ]);

        $this->command->info('Administrator User Created !');
    }
}
