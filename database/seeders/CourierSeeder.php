<?php

namespace Database\Seeders;

use App\Models\Courier;
use App\Models\CourierRate;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $couriers = [
            [
                'name' => 'Lalamove',
                'type' => 'motorcycle',
                'rates' => [
                    ['min_km' => 0, 'max_km' => 5, 'rate_per_km' => 10],
                    ['min_km' => 5.01, 'max_km' => 20, 'rate_per_km' => 8],
                ],
            ],
            [
                'name' => 'LBC',
                'type' => 'truck',
                'rates' => [
                    ['min_km' => 0, 'max_km' => 10, 'rate_per_km' => 15],
                    ['min_km' => 10.01, 'max_km' => 50, 'rate_per_km' => 12],
                ],
            ],
            [
                'name' => 'Ninja Van',
                'type' => 'van',
                'rates' => [
                    ['min_km' => 0, 'max_km' => 25, 'rate_per_km' => 9],
                ],
            ]
        ];

        foreach ($couriers as $data) {
            $courier = Courier::create([
                'name' => $data['name'],
                'type' => $data['type'],
                'active' => true,
            ]);

            foreach ($data['rates'] as $rate) {
                CourierRate::create([
                    'courier_id' => $courier->id,
                    'min_km' => $rate['min_km'],
                    'max_km' => $rate['max_km'],
                    'rate_per_km' => $rate['rate_per_km'],
                ]);
            }
        }
    }
}
