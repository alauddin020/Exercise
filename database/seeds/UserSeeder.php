<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Spatie\Permission\Models\Role::create([
            'name'=>'superadmin',
            'guard_name'=>'web'
        ]);
        \Spatie\Permission\Models\Role::create([
            'name'=>'user',
            'guard_name'=>'web'
        ]);
        User::create([
            'name' => 'Alauddin F-a',
            'email' => 'alauddin020@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('alauddin'),
            'remember_token' => Str::random(10),
        ])->assignRole(['superadmin']);

    }
}
