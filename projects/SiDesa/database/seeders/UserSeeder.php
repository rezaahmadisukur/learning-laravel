<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Resident;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            "name" => "Admin SiDesa",
            "email" => "admin@gmail.com",
            "password" => "password",
            "status" => "approved",
            "role_id" => "1",
        ]);

        User::create([
            'id' => 2,
            "name" => "Penduduk 1",
            "email" => "penduduk1@gmail.com",
            "password" => "password",
            "status" => "approved",
            "role_id" => "2",
        ]);

        Resident::create([
            'user_id' => 2,
            'nik' => '1234567812345678',
            'name' => 'Adam',
            'gender' => 'male',
            'birth_of_date' => '2005-01-01',
            'birth_of_place' => 'Cirebon',
            'address' => 'Cirebon',
            'marital_status' => 'single',
        ]);
    }
}
