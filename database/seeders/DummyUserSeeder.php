<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'teamName' => 'Tralala',
                'password' => bcrypt('Tralala@123'),
                'userType' => 'binusian',
            ],

            [
                'teamName' => 'Bimbimbim',
                'password' => bcrypt('Bimbimbim@123'),
                'userType' => 'non-binusian',
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
