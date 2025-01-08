<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
            'name' => 'Admin',
            'email' =>'admin@mail.com',
            'password' => Hash::make('admin123'),
            'phone' => 1234567890,
            'country' =>null,
            'address' => null,
            'status' =>1,
            'type' => 0,
            'role_id' => 1,
        ]);
    }
}
