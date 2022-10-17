<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            'nama_lengkap'      => 'Syahrul',
            'email'     => 'syahrul@gmail.com',
            'password'  =>  Hash::make(12345678),
            'role'  => 1
        );

        User::create($users);
    }
}
