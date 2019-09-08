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
        // DB::table('users')->delete();
        // DB::table('users')->insert([
        //     'firstname' => Str::random(6),
        //     'lastname' => Str::random(10),
        //     'email' => Str::random(16) . '@gmail.com',
        //     'password' => bcrypt('secret')
        // ]);
        
        
        // for ($i = 0; $i < 3; $i++) {
        //     User::create([
        //         'first_name' => Str::random(6),
        //         'last_name' => Str::random(10),
        //         'email' => Str::random(16) . '@gmail.com',
        //         'password' => bcrypt('secret'),
        //         'role' => 'guest'
        //     ]);
        // }
        // User::create([
        //     'first_name' => Str::random(6),
        //     'last_name' => Str::random(10),
        //     'email' => Str::random(16) . '@gmail.com',
        //     'password' => bcrypt('secret'),
        //     'role' => 'writer'
        // ]);
        // User::create([
        //     'first_name' => Str::random(6),
        //     'last_name' => Str::random(10),
        //     'email' => Str::random(16) . '@gmail.com',
        //     'password' => bcrypt('secret'),
        //     'role' => 'writer'
        // ]);

        factory(User::class,10)->create();
        $users = User::all();
        foreach ($users as $user) {
            if ($user->role == 'guest') {
                $user->update([
                    'premium' => rand(0,1)
                ]);
           }
        }
        User::create([
            'first_name' => 'ImaAdmin',
            'last_name' => Str::random(10),
            'email' => 'admin@admin.nl',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);
        User::create([
            'first_name' => 'ImaGuest',
            'last_name' => Str::random(10),
            'email' => 'guest@guest.nl',
            'password' => bcrypt('guest'),
            'role' => 'guest',
            'premium' => true
        ]);
        User::create([
            'first_name' => 'ImaGuest2',
            'last_name' => Str::random(10),
            'email' => 'guest2@guest.nl',
            'password' => bcrypt('guest2'),
            'role' => 'guest',
            'premium' => false
        ]);
        User::create([
            'first_name' => 'ImaWriter',
            'last_name' => Str::random(10),
            'email' => 'writer@writer.nl',
            'password' => bcrypt('writer'),
            'role' => 'writer'
        ]);
    }
}
