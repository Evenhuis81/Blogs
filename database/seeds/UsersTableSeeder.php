<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'firstname' => Str::random(6),
        //     'lastname' => Str::random(10),
        //     'email' => Str::random(16) . '@gmail.com',
        //     'password' => bcrypt('secret')
        // ]);
        for ($i = 0; $i < 3; $i++) {
            User::create([
                'first_name' => Str::random(6),
                'last_name' => Str::random(10),
                'email' => Str::random(16) . '@gmail.com',
                'password' => bcrypt('secret')
            ]);
        }
    }
}
