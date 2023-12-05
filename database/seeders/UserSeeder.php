<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default credentials
        if (env('APP_ENV') == "local"){
            User::truncate();
        }
        $avatar_name = [
            '1701317747327.jpg',
            '1701317747431.jpg',
            '1701317747458.jpg',
            '1701317747460.jpg',
            '1701317747465.jpg',
            '1701317747484.jpg',
            '1701317747487.jpg',
            '1701317747506.jpg',
            '1701317747573.jpg',
            '1701317747588.jpg',
            '1701317747615.jpg',
            '1701317747668.jpg',
            '1701317747796.jpg',
            '1701317747811.jpg',
            '1701317747911.jpg',
            '1701317747921.jpg',
        ];
        $faker = Faker::create('vi_VN'); 
        User::create([
            'name' => 'Tổng tài',
            'email' => 'admin@gmail.com',
            'phone' => '0123456789',
            'avatar' => $faker->randomElement($avatar_name),
            'password' =>  '$2y$10$JkgZ0nvUBd3F9/exuhCHWu7tCl3Sl/itAiSXuq8KW5uI1.eaI2VwC',
            'role_id' => 99,
            'remember_token' => Str::random(20),
        ]);
        foreach(range(1,50) as $index){
            $phone = str_replace(['84', '-', '(', ')', '+', ' '], ['0', '', '', '','', ''], $faker->phoneNumber());
            $stringLen = strlen($phone);
            if($stringLen<10){
                for($i=0;$i<10-$stringLen;$i++){
                    $phone .= $faker->numberBetween(0, 9);
                }
            }elseif ($stringLen>10){
                $phone = substr($phone, 0, 10);
            } 
            User::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'phone' => $phone,
                'avatar' => $faker->randomElement($avatar_name),
                'password' =>  '$2y$10$JkgZ0nvUBd3F9/exuhCHWu7tCl3Sl/itAiSXuq8KW5uI1.eaI2VwC',
                'role_id' => 1,
                'remember_token' => Str::random(20),
            ]);
        }
        
    }
}
