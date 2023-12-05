<?php

namespace Database\Seeders;

use App\Http\Controllers\Front\LocationController;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json_path_provinces = public_path('json/provinces.json');
        $json_provinces = File::get($json_path_provinces);
        $provinces = json_decode($json_provinces);
        foreach($provinces as $province){
            Province::create([
                'id' => $province->code,
                'full_name' => $province->name,
                'name' => str_replace(['Thành phố ', 'Tỉnh '], '', $province->name),
            ]);
        }

        $json_path_districts = public_path('json/districts.json');
        $json_districts = File::get($json_path_districts);
        $districts = json_decode($json_districts);
        foreach($districts as $district){
            District::create([
                'id' => $district->code,
                'province_id' => $district->province_code, 
                'full_name' => $district->name,
                'name' => str_replace(['Quận ', 'Huyện ', 'Thị xã ', 'Thành phố '], '', $district->name),
            ]);
        }

        $json_path_wards = public_path('json/wards.json');
        $json_wards = File::get($json_path_wards);
        $wards = json_decode($json_wards);
        foreach($wards as $ward){
            Ward::create([
                'id' => $ward->code,
                'district_id' => $ward->district_code, 
                'full_name' => $ward->name,
                'name' => str_replace(['Xã ', 'Phường ', 'Thị trấn '], '', $ward->name),
            ]);
        }
    }
}
