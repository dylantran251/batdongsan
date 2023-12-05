<?php

namespace App\Http\Controllers\Front;

use App\Helper;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;

class LocationController extends Controller
{

    public function getProvincesData(){
        try{
            $provinces = Province::all();
            if($provinces->count() < 0){
                $response = Http::get('https://provinces.open-api.vn/api/?depth=1');
                $provinces = $response->json();
            };
            return Response::json(['data' => $provinces], 200);
        }
        catch(Exception $e){
            Response::json(['message' => 'Đã xảy ra lỗi '.$e->getMessage()], 500);
        }
    }

    public function getDistrictsData($province_id){
        try{
            $districts = District::where('province_id', $province_id)->get();
            if($districts->count() === 0){
                $host = 'https://provinces.open-api.vn/api/';
                $response = Http::get($host. "p/$province_id?depth=2");
                $districts = $response->json();
                return $districts;
            }else{
                return Response::json($districts);
            }
        }catch(Exception $exception){
            Response::json([]);
        }
    }
    public function getWardsData($district_id){
        try{
            $wards = Ward::where('district_id', $district_id)->get();
            if($wards === 0){
                $host = 'https://provinces.open-api.vn/api/';
                $response = Http::get($host. "d/$district_id?depth=2");
                $wards = $response->json();
                return $wards;
            }else{
                return Response::json($wards);
            }
        }catch(Exception $exception){
            Response::json([]);
        }
    }
    // Show name province and quantity posts by this in page menu and  post detail
    public function dataPostsByProvince($category_id, $real_estate_type){
        $twelve_provinces = Province::orderBy('id')->limit(12)->get();
        $data = [];
        foreach($twelve_provinces as $province){
            $quantity_posts = ($real_estate_type !== null) 
            ? $province->posts()->where('type', 1)->where('category_id', $category_id)->where('real_estate_type', $real_estate_type)->count() 
            : $province->posts()->where('type', 1)->where('category_id', $category_id)->count() ;
            $data[] = [
                'province_id' => $province->id, 
                'province_name' => $province->getShortenProvinceNameAttribute(), 
                'province_full_name' => $province->name,
                'quantity_posts' => $quantity_posts,
            ];
        }
        return $data;
    }


    public function loadMoreProvinces(Request $request){
        try{
            $data = $request->all();
            $remaining_provinces  = Province::orderBy('id')->skip(12)->take(51)->get();
            $dataPostsByProvince = [];
            foreach ($remaining_provinces as $province){
                $quantity_posts = isset($data['real_estate_type']) 
                ? $province->posts()->where('type', 1)->where('category_id', $data['category_id'])->where('real_estate_type', $data['real_estate_type'])->count() 
                : $province->posts()->where('type', 1)->where('category_id', $data['category_id'])->count() ;
                $dataPostsByProvince[] = [
                    'province_id' => $province->id, 
                    'province_full_name' => $province->name,
                    'province_name' => $province->getShortenProvinceNameAttribute(),
                    'quantity_posts' => $quantity_posts,
                    'real_estate_type' => $data['real_estate_type'],
                ];
            }
            return Response::json(['data' => $dataPostsByProvince], 200);
        }catch(Exception $e){
            return Response::json(['error' => 'Đã có lỗi xảy ra '. $e->getMessage()], 500);
        }
    }

    // Show name ward and quantity posts and price/m2 avg by this in post detail page

    public function dataPostsByWard($category_id, $district_id, $real_estate_type){
        $wards = Ward::where('district_id', $district_id)->get();
        $dataPostByWard = [];
        foreach($wards as $ward){
            $quantity_posts = $ward->posts()->where('category_id', $category_id)->where('type', 1)->where('real_estate_type', $real_estate_type)->count();
            $sub_price_average = $ward->posts->where('category_id', $category_id)->where('type', 1)->where('real_estate_type', $real_estate_type)->avg('sub_price');
            $sub_price_average_format = Helper::formatCurrencyVND($sub_price_average);
            if($sub_price_average_format === 'Thỏa thuận'){
                $sub_price_average_format = 'Chưa có dữ liệu';
            }
            $dataPostByWard[] = [
                'ward_id' => $ward->id,
                'ward_name' => $ward->name,
                'quantity_posts' => $quantity_posts,
                'sub_price_average' => $sub_price_average_format,
            ];
        }
        $count = count($dataPostByWard);
        $data = [
            'first_eight_data' => array_slice($dataPostByWard, 0, 8),
            'remaining_data' => array_slice($dataPostByWard, 8),
            'all_data' => $dataPostByWard, 
        ] ;
        return $data;
    }

    public function loadMoreWardsData(Request $request){
        try{
            $data = $request->all();
            $remaining_data = $this->dataPostsByWard($data['category_id'], $data['district_id'], $data['real_estate_type'])['remaining_data'];
            return Response::json(['data' => $remaining_data], 200);
        }catch(Exception $e){
            return Response::json(['message' => 'Đã xảy ra lỗi '.$e->getMessage()], 500);
        }
    }

}