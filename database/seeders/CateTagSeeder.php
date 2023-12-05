<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CateTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // foreach (['Nhà đất cần bán', 'Nhà đất cho thuê', 'Sang nhượng', 'Chung cư', 'Mái Thái'] as $cate)
        // {
        //     Category::updateOrCreate(['name'=> strtolower($cate), 'parent_id' => 2]);
        // }
        foreach (['vành đai 3', 'vinhome ocean', 'teco'] as $tag)
        {
            Tag::updateOrCreate(['name'=> strtolower($tag)]);
        }
    }
}
