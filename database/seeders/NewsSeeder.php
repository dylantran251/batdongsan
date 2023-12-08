<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            "1702005881607.png",
            "1702005881640.jpg",
            "1702005881715.png",
            "1702005881840.jpg",
            "1702005881905.png",
            "1702007911432.jpg",
            "1702007911572.jpg",
            "1702007911753.jpg",
            "1702007911784.jpg",
            "1702007911976.jpg",
            "1702007911977.jpg",
            "1702010092543.jpg",
            "1702010155231.jpg",
            "1702017724148.webp",
            "1702017724226.jpg",
            "1702017724245.jpg",
            "1702017724326.jpg",
            "1702017724365.jpg",
            "1702017724466.jpg",
            "1702017724506.jpg",
            "1702017724585.jpg",
            "1702017724729.jpg",
            "1702017724795.jpg",
            "1702017724829.jpg",
        ];
        $faker = Faker::create('vi_VN'); 
        foreach($images as $image){
            News::create([
                'user_id' => $faker->numberBetween(1, 20),
                'title' => $faker->sentence,
                'content' => $faker->paragraph,
                'author' => $faker->name,
                'avatar' => $image,
                'description' => $faker->text(200),
            ]);
        }
    }
}
