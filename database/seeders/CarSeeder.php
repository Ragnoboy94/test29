<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'test@example.com')->first();
        $pairs = [
            ['Toyota', 'Corolla'],
            ['BMW', '3 Series'],
            ['Audi', 'A4'],
        ];
        foreach ($pairs as [$bn, $mn]) {
            $b = Brand::where('name', $bn)->first();
            $m = CarModel::where('brand_id', $b->id)->where('name', $mn)->first();
            Car::create([
                'brand_id' => $b->id,
                'car_model_id' => $m->id,
                'year' => 2018,
                'mileage' => 45000,
                'color' => 'white',
                'user_id' => $user?->id,
            ]);
        }
    }
}
