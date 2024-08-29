<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ['approved1', 'pending', 'approved2', 'rejected', 'completed'];
        $vehicle_ids = range(1, 10);
        $order_dates = [];
        $end_dates = [];

        for ($i = 0; $i < 10; $i++) {
            $order_date = Carbon::parse('2021-01-01')->addDays(rand(0, 30));
            $end_date = $order_date->copy()->addDays(1);
            $order_dates[] = $order_date->format('Y-m-d');
            $end_dates[] = $end_date->format('Y-m-d');
        }

        $order = [
            [
                'driver_id' => 1,
                'vehicle_id' => Arr::random($vehicle_ids),
                'status' => Arr::random($statuses),
                'order_date' => Arr::random($order_dates),
                'end_date' => Arr::random($end_dates),
            ],
            [
                'driver_id' => 2,
                'vehicle_id' => Arr::random($vehicle_ids),
                'status' => Arr::random($statuses),
                'order_date' => Arr::random($order_dates),
                'end_date' => Arr::random($end_dates),
            ],
            [
                'driver_id' => 3,
                'vehicle_id' => Arr::random($vehicle_ids),
                'status' => Arr::random($statuses),
                'order_date' => Arr::random($order_dates),
                'end_date' => Arr::random($end_dates),
            ],
            [
                'driver_id' => 4,
                'vehicle_id' => Arr::random($vehicle_ids),
                'status' => Arr::random($statuses),
                'order_date' => Arr::random($order_dates),
                'end_date' => Arr::random($end_dates),
            ],
            [
                'driver_id' => 5,
                'vehicle_id' => Arr::random($vehicle_ids),
                'status' => Arr::random($statuses),
                'order_date' => Arr::random($order_dates),
                'end_date' => Arr::random($end_dates),
            ],
            [
                'driver_id' => 6,
                'vehicle_id' => Arr::random($vehicle_ids),
                'status' => Arr::random($statuses),
                'order_date' => Arr::random($order_dates),
                'end_date' => Arr::random($end_dates),
            ],
            [
                'driver_id' => 6,
                'vehicle_id' => Arr::random($vehicle_ids),
                'status' => Arr::random($statuses),
                'order_date' => Arr::random($order_dates),
                'end_date' => Arr::random($end_dates),
            ],
            [
                'driver_id' => 8,
                'vehicle_id' => Arr::random($vehicle_ids),
                'status' => Arr::random($statuses),
                'order_date' => Arr::random($order_dates),
                'end_date' => Arr::random($end_dates),
            ],
            [
                'driver_id' => 8,
                'vehicle_id' => Arr::random($vehicle_ids),
                'status' => Arr::random($statuses),
                'order_date' => Arr::random($order_dates),
                'end_date' => Arr::random($end_dates),
            ],
            [
                'driver_id' => 10,
                'vehicle_id' => Arr::random($vehicle_ids),
                'status' => Arr::random($statuses),
                'order_date' => Arr::random($order_dates),
                'end_date' => Arr::random($end_dates),
            ],
        ];

        foreach ($order as $value) {
            Order::create($value);
        }
    }
}
