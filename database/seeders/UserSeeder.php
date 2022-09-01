<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    
    public function run()
    {
        $users =  [
            [
            'name' => 'Muhammad',
            'email' => 'muhammadlive7858@gmail.com',
            'email_verified_at'=>now(),
            'role' => 'director',
            'password' => Hash::make('muhammad'),
            'remember_token'=>Str::random(10), 
            ],
            [
                'name' => 'abbos',
                'email' => 'abbos@gmail.com',
                'email_verified_at'=>now(),
                'role' => 'director',
                'password' => Hash::make('abbosbek'),
                'remember_token'=>Str::random(10), 
                ]
        ];
        DB::table('users')->insert($users);
    }
}
