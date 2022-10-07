<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'username'      => 'ok',
            'email'     => 'ok@gmail.com',
            'password'  => Hash::make('12345'),
            'is_admin' => 0,
        ]);
        DB::table('users')->insert([
            'username'      => 'dan nguyen',
            'email'     => 'dan@gmail.com',
            'password'  => Hash::make('12345'),
            'is_admin' => 0,
        ]);

        DB::table('users')->insert([
            'username'      => 'Kent nguyen',
            'email'     => 'kent@gmail.com',
            'password'  => Hash::make('12345'),
            'is_admin' => 0,
        ]);

        DB::table('users')->insert([
            'username'      => 'Vip nguyen',
            'email'     => 'vip@gmail.com',
            'password'  => Hash::make('12345'),
            'is_admin' => 0,
        ]);
        DB::table('users')->insert([
            'username'      => 'Test Account',
            'email'     => 'test@gmail.com',
            'password'  => Hash::make('test'),
            'is_admin' => 0,
        ]);
        DB::table('users')->insert([
            'username'      => 'Tesla ',
            'email'     => 'tesla@gmail.com',
            'password'  => Hash::make('tesla'),
            'is_admin' => 0,
        ]);
    }
}
