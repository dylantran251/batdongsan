<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::insert([
            [
                'name' => 'hotline',
                'values' => '0973997777', 
                'status' => true
            ],
            [
                'name' => 'logo',
                'values' => 'logo.png',
                'status' => true
            ],
            [
                'name' => 'website',
                'values' => 'Muabannhadatchinhchu.vn',
                'status' => true
            ],
            [
                'name' => 'đoạn mô tả 1',
                'values' => 'là website số 1 về bất động sản tại Việt Nam(*) giúp những người tìm kiếm bất động sản tìm được ngôi nhà của mình với hàng triệu tin đăng bất động sản mỗi tháng và những thông tin, tư vấn giúp họ có thể tự tin hơn mỗi khi ra quyết định liên quan tới bất động sản.',
                'status' => true
            ],
            [
                'name' => 'đoạn mô tả 2',
                'values' => 'Muabannhadatchinhchu.vn cũng là nền tảng công nghệ và đối tác tin cậy đối với các cá nhân, doanh nghiệp kinh doanh bất động sản và các chủ đầu tư trong việc truyền thông, nghiên cứu thị trường dựa trên các dữ liệu lớn (big data) trực tuyến và cung cấp các ứng dụng, giải pháp bán hàng và quản lý bán hàng, marketing trong lĩnh vực bất động sản.',
                'status' => true
            ],
            [
                'name' => 'email hỗ trợ',
                'values' => 'Muabannhadatchinhchu.vn',
                'status' => true
            ],
            [
                'name' => 'trụ sở',
                'values' => 'Mỹ đình 1, Nam Từ Liêm - TP Hà Nội',
                'status' => true
            ]
        ]);
    }
}
