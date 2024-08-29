<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drivers = [
             'Bagus Nugraha',
             'Sinta Ayu',   
             'Fauzan Kurniawan',
             'Fani Indah',          
             'Bayu Pratama',          
             'Tia Mawarni',          
             'Rizal Firmansyah',          
             'Sari Kurnia',         
             'Rendi Saputra',          
             'Dini Rahmawati',
             'Aldo Pratama',
             'Mega Sari',               
        ];


        foreach ($drivers as $driver) {
            Driver::create([
                'driver_name' => $driver,
            ]);
        }
    }
}
