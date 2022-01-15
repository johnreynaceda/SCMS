<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barangay;
use App\Models\UserType;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barangay::create([
            'barangay_name' => 'Bambad',
        ]);
        Barangay::create([
            'barangay_name' => 'Bual',
        ]);
        Barangay::create([
            'barangay_name' => 'Dansuli',
        ]);
        Barangay::create([
            'barangay_name' => 'DLotilla',
        ]);
        Barangay::create([
            'barangay_name' => 'Impao',
        ]);
        Barangay::create([
            'barangay_name' => 'Kalawag I',
        ]);
        Barangay::create([
            'barangay_name' => 'Kalawag II',
        ]);
        Barangay::create([
            'barangay_name' => 'Kalawag III',
        ]);
        Barangay::create([
            'barangay_name' => 'Kenram',
        ]);
        Barangay::create([
            'barangay_name' => 'Kolambog',
        ]);
        Barangay::create([
            'barangay_name' => 'Kulanding',
        ]);
        Barangay::create([
            'barangay_name' => 'Lagandang',
        ]);
        Barangay::create([
            'barangay_name' => 'Laguilayan',
        ]);
        Barangay::create([
            'barangay_name' => 'Mapantig',
        ]);
        Barangay::create([
            'barangay_name' => 'New Pangasinan',
        ]);
        Barangay::create([
            'barangay_name' => 'Sampao',
        ]);
        Barangay::create([
            'barangay_name' => 'Tayugo',
        ]);

        UserType::create([
            'type' => 'osca',
            
        ]);
        UserType::create([
            'type' => 'barangay',
            
        ]);

        User::create([
            'name' => 'osca',
            'email' => 'osca@gmail.com',
            'password' => Hash::make('password'),
            'user_type_id' => 0,
        ]);
        User::create([
            'name' => 'barangay',
            'email' => 'barangay@gmail.com',
            'password' => Hash::make('password'),
            'barangay_id' => 1,
            'user_type_id' => 1,
        ]);
    }
}
