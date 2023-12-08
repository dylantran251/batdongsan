<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\District;
use App\Models\Keyword;
use App\Models\KeywordPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Province;
use App\Models\Ward;
use DateInterval;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN'); 
        $images = [
            '1700805088160.jpg',
            '1700805088671.jpg',
            '1700805089678.jpg',
            '1700805090413.jpg',
            '1700805090453.jpg',
            '1700805090718.jpg',
            '1700805091157.jpg',
            '1700805091215.jpg',
            '1700805091498.jpg',
            '1700805091800.jpg',
            '1700805092286.jpg',
            '1700805092353.jpg',
            '1700805092995.jpg',
            '1700805093364.jpg',
            '1700805093395.jpg',
            '1700805093437.jpg',
            '1700805093806.jpg',
            '1700805094110.png',
            '1700805094427.jpg',
            '1700805094516.jpg',
            '1700805094521.jpg',
            '1700805094572.jpg',
            '1700805094756.jpg',
            '1700805095104.png',
            '1700805095231.png',
            '1700805095312.png',
            '1700805095378.jpg',
            '1700805095386.jpg',
            '1700805095396.png',
            '1700805096305.jpg',
            '1700805096508.jpg',
            '1700805096619.jpg',
            '1700805096707.jpg',
            '1700805096746.jpg',
            '1700805096784.jpg',
            '1700805096796.jpg',
            '1700805096933.jpg',
        ];
        
        foreach (range(1, 500) as $index) {
            $provinces = Province::all();
            $province_id = $faker->randomElement($provinces->pluck('id')->toArray());
            $province = Province::where('id', $province_id)->first();
            $districts = District::where('province_id', $province_id)->get();
            $district_id = $faker->randomElement($districts->pluck('id')->toArray());
            $wards = Ward::where('district_id', $district_id)->get();
            $ward_id = $faker->randomElement($wards->pluck('id')->toArray());
            if($ward_id === null){
                $ward_id = 0;
            }

            $category_id = 0;
            $real_estate_type_id = 0;
            $randImages = null;
            $keyword_name = $faker->text(100);
            $keyword_id = 0;

            $category_id = $faker->numberBetween(1,3);
            if($category_id === 1){
                $keyword_name = 'bán';
            }elseif($category_id === 2){
                $keyword_name = 'môi giới';
            }else{
                $keyword_name = 'cho thuê';
            }
            $real_estate_types = Category::where('parent_id', $category_id)->orWhere('parent_id', -1)->get();
            $real_estate_type_id = $faker->randomElement($real_estate_types->pluck('id')->toArray());
            $real_estate_type = $real_estate_types->where('id', $real_estate_type_id)->first();
            $keyword_name = $keyword_name.' '.$real_estate_type->name ; 
            $randImages = $faker->randomElements($images, 5);
            $keyword_name = ucfirst(strtolower($keyword_name)) .' '. $province->name;
            $keyword = Keyword::create([
                'name' => $keyword_name
            ]);
            $keyword_id = $keyword->id;

            $created_at = $faker->dateTimeBetween('2023-01-01', 'now');
            $expired_at = clone $created_at; // Clone để tránh thay đổi đối tượng gốc
            $expired_at->add(new DateInterval('P1M'));
            $post = Post::create([
                'user_id' => $faker->numberBetween(1,50),
                'province_id' => $province_id,
                'district_id' => $district_id,
                'ward_id' => $ward_id,
                'category_id' => $category_id,
                'vip' => $faker->numberBetween(0,3),
                'title' => $faker->text(100),
                'images' => json_encode($randImages),
                'price' => $faker->numberBetween(1000000000, 5000000000),
                'sub_price' => $faker->numberBetween(1000000, 500000000),
                'area' => $faker->numberBetween(20, 500),
                'floors' => $faker->numberBetween(1, 20),
                'bedroom' => $faker->numberBetween(1, 5),
                'toilet' => $faker->numberBetween(1, 5),
                'house_direction' => $faker->numberBetween(1,8),
                'balcony_direction' => $faker->numberBetween(1,8),
                'status' => $faker->numberBetween(1,2),
                'legal_documents' => $faker->randomElement(['Sổ đỏ/Sổ hồng', 'Giấy tờ viết tay', 'Đang chờ cấp giấy tờ']),
                'description' => $faker->realText(1000, 5),
                'real_estate_type' => $real_estate_type_id, 
                'created_at' => $created_at,
                'expired_at' => $expired_at
            ]);
            KeywordPost::create([
                'post_id' => $post->id,
                'keyword_id' => $keyword_id,
            ]);
            dump($keyword_name);
        }
    }
}
