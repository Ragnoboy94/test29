<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\CarModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Toyota' => ['Corolla', 'Camry', 'RAV4'],
            'BMW' => ['3 Series', '5 Series', 'X5'],
            'Audi' => ['A3', 'A4', 'Q5'],
        ];
        foreach ($data as $brand => $models) {
            $b = Brand::firstOrCreate(['name' => $brand]);
            foreach ($models as $m) {
                CarModel::firstOrCreate(['brand_id' => $b->id, 'name' => $m]);
            }
        }
    }
}
