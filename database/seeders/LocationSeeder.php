<?php

namespace Database\Seeders;

use App\Http\Controllers\Front\LocationController;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $location = new LocationController();
        $data = json_decode($location->getProvincesData()); 
        $count = 0;
        foreach ($data as $item) {
            $province = Province::create([
                'name' => $item['name'],
                'code' => $item['code'],
            ]);
            $districts = $location->getDistrictsData($item['code']);
            foreach ($districts['districts'] as $item1) {
                $district = $province->districts()->create([
                    'name' => $item1['name'],
                ]);
                dump($item1, 'Quận huyện');
                $wards = $location->getWardsData($item1['code']);
                foreach($wards['wards'] as $item2){
                    $district->wards()->create([
                        'name' => $item2['name'],
                    ]);
                    dump($item2['name']);
                }
            }
            echo $count++;
        }
    }
}
