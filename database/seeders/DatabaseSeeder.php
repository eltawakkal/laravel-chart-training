<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ItemMarhalah;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $dataUsers = [
            [
                'name' => 'Akil',
                'gender' => 'Laki-laki',
                'marhalah' => 1,
            ],
            [
                'name' => 'Jorda',
                'gender' => 'Laki-laki',
                'marhalah' => 2,
            ],
            [
                'name' => 'Linda',
                'gender' => 'Perempuan',
                'marhalah' => 3,
            ],
            [
                'name' => 'Randy',
                'gender' => 'Laki-laki',
                'marhalah' => 1,
            ],
            [
                'name' => 'Sintia',
                'gender' => 'Perempuan',
                'marhalah' => 1,
            ],
        ];

        $dataMarhalahs = [
            [
                'name' => 'Marhalah Ula'
            ],
            [
                'name' => 'Marhalah Wustha'
            ],
            [
                'name' => 'Marhalah Ulya'
            ]
        ];

        User::insert($dataUsers);
        ItemMarhalah::insert($dataMarhalahs);
    }
}
