<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $created_at = Carbon::now();
        DB::table('users')->insert([
            'name'      => 'ok',
            'email'     => 'ok@gmail.com',
            'password'  => Hash::make('12345'),
            'is_admin' => 0,
            'created_at' => $created_at
        ]);
        DB::table('users')->insert([
            'name'      => 'dan nguyen',
            'email'     => 'dan@gmail.com',
            'password'  => Hash::make('12345'),
            'is_admin' => 0,
            'created_at' => $created_at
        ]);

        DB::table('users')->insert([
            'name'      => 'Kent nguyen',
            'email'     => 'kent@gmail.com',
            'password'  => Hash::make('12345'),
            'is_admin' => 0,
            'created_at' => $created_at,
        ]);

        DB::table('users')->insert([
            'name'      => 'Vip nguyen',
            'email'     => 'vip@gmail.com',
            'password'  => Hash::make('12345'),
            'is_admin' => 0,
            'created_at' => $created_at
        ]);
        DB::table('users')->insert([
            'name'      => 'Test Account',
            'email'     => 'test@gmail.com',
            'password'  => Hash::make('test'),
            'is_admin' => 0,
            'created_at' => $created_at
        ]);
        DB::table('users')->insert([
            'name'      => 'Tesla ',
            'email'     => 'tesla@gmail.com',
            'password'  => Hash::make('tesla'),
            'is_admin' => 0,
            'created_at' => $created_at
        ]);
    }
}
