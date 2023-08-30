<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Менеджер',
            'email' => 'manager@example.com',
            'password' => Hash::make('password'),
            'role' => 'manager', // Роль менеджера
        ]);

        $clientData = [
            [
                'name' => 'Клиент 1',
                'email' => 'client1@example.com',
                'password' => Hash::make('password'),
                'role' => 'client', // Роль клиента
            ],
            [
                'name' => 'Клиент 2',
                'email' => 'client2@example.com',
                'password' => Hash::make('password'),
                'role' => 'client', // Роль клиента
            ],
            // Добавьте дополнительных клиентов, если необходимо
        ];

        DB::table('users')->insert($clientData);
    }
}
