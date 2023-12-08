<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for($i=1;$i<=3;$i++){
            $data = [
                [
                    'name' => 'Căn hộ chung cư',
                    'parent_id' => $i,
                    'type' => 1,
                ],
                [
                    'name' => 'Nhà riêng',
                    'parent_id' => 1,
                    'type' => 1,
                ],
                [
                    'name' => 'Nhà biệt thự, liền kề',
                    'parent_id' => $i,
                    'type' => 1,
                ],
                [
                    'name' => 'Nhà mặt phố',
                    'parent_id' => $i,
                    'type' => 1,
                ],
                [
                    'name' => 'Shophouse, nhà phố thương mại',
                    'parent_id' => $i,
                    'type' => 1,
                ],
                [
                    'name' => 'Bất động sản khác',
                    'parent_id' => $i,
                    'type' => 1,
                ],    
            ];
        }
        Category::insert([
            [
                'name' => 'Nhà đất chính chủ',
                'parent_id' => 0,
                'type' => 1,
            ],
            [
                'name' => 'Nhà đất trung gian',
                'parent_id' => 0,
                'type' => 1,
            ],
            [
                'name' => 'Nhà đất cho thuê',
                'parent_id' => 0,
                'type' => 1,
            ],
            [
                'name' => 'Nội thất',
                'parent_id' => 0,
                'type' => 0,
            ],
            [
                'name' => 'Thang máy',
                'parent_id' => 0,
                'type' => 0,
            ],
            // Nhà đất chính chủ
            [
                'name' => 'Đất nền dự án',
                'parent_id' => 1,
                'type' => 1,
            ],
            [
                'name' => 'Bán đất',
                'parent_id' => 1,
                'type' => 1,
            ],
            [
                'name' => 'Trang trại, khu nghỉ dưỡng',
                'parent_id' => 1,
                'type' => 1,
            ],
            [
                'name' => 'Condotel',
                'parent_id' => 1,
                'type' => 1,
            ],
            [
                'name' => 'Kho, nhà xưởng',
                'parent_id' => 1,
                'type' => 1,
            ],

            // Nhà đất cho thuê
            [
                'name' => 'Nhà trọ phòng trọ',
                'parent_id' => 3,
                'type' => 1,
            ],
            [
                'name' => 'Văn phòng',
                'parent_id' => 3,
                'type' => 1,
            ],
            [
                'name' => 'Sang nhượng cửa hàng, kiot',
                'parent_id' => 3,
                'type' => 1,
            ],
            [
                'name' => 'Kho, nhà xưởng, đất',
                'parent_id' => 3,
                'type' => 1,
            ],
            // Nhà đất trung gian
            [
                'name' => 'Cao ốc, văn phòng',
                'parent_id' => 2,
                'type' => 1,
            ],
            [
                'name' => 'Trung tâm, thương mại',
                'parent_id' => 2,
                'type' => 1,
            ],
            [
                'name' => 'Khu đô thị phức hợp',
                'parent_id' => 2,
                'type' => 1,
            ],
            [
                'name' => 'Khu phức hợp',
                'parent_id' => 2,
                'type' => 1,
            ],
            [
                'name' => 'Nhà ở xã hội',
                'parent_id' => 2,
                'type' => 1,
            ],
            [
                'name' => 'Khu nghỉ dưỡng, sinh thái',
                'parent_id' => 2,
                'type' => 1,
            ],
            $data
        ]);

    }
}
