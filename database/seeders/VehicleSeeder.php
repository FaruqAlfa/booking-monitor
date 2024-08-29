<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicles = [
            [
                'vehicle_name' => 'Dump Truck',
                'vehicle_number' => 'DT001',
                'vehicle_type' => 'Heavy',
            ],
            [
                'vehicle_name' => 'Excavator',
                'vehicle_number' => 'EX001',
                'vehicle_type' => 'Heavy',
            ],
            [
                'vehicle_name' => 'Bulldozer',
                'vehicle_number' => 'BD001',
                'vehicle_type' => 'Heavy',
            ],
            [
                'vehicle_name' => 'Loader',
                'vehicle_number' => 'LD001',
                'vehicle_type' => 'Heavy',
            ],
            [
                'vehicle_name' => 'Grader',
                'vehicle_number' => 'GR001',
                'vehicle_type' => 'Heavy',
            ],
            [
                'vehicle_name' => 'Crane',
                'vehicle_number' => 'CR001',
                'vehicle_type' => 'Heavy',
            ],
            [
                'vehicle_name' => 'Drill Rig',
                'vehicle_number' => 'DR001',
                'vehicle_type' => 'Heavy',
            ],
            [
                'vehicle_name' => 'Water Truck',
                'vehicle_number' => 'WT001',
                'vehicle_type' => 'Heavy',
            ],
            [
                'vehicle_name' => 'Rock Breaker',
                'vehicle_number' => 'RB001',
                'vehicle_type' => 'Heavy',
            ],
            [
                'vehicle_name' => 'Articulated Truck',
                'vehicle_number' => 'AT001',
                'vehicle_type' => 'Heavy',
            ],
            [
                'vehicle_name' => 'Backhoe Loader',
                'vehicle_number' => 'BL001',
                'vehicle_type' => 'Heavy',
            ],
            [
                'vehicle_name' => 'Road Roller',
                'vehicle_number' => 'RR001',
                'vehicle_type' => 'Heavy',
            ],
            [
                'vehicle_name' => 'Concrete Mixer',
                'vehicle_number' => 'CM001',
                'vehicle_type' => 'Heavy',
            ],
            [
                'vehicle_name' => 'Forklift',
                'vehicle_number' => 'FL001',
                'vehicle_type' => 'Medium',
            ],
            [
                'vehicle_name' => 'Skid Steer Loader',
                'vehicle_number' => 'SSL001',
                'vehicle_type' => 'Medium',
            ],
        ];

        foreach ($vehicles as $vehicle) {
            Vehicle::create($vehicle);
        }
    }
}
