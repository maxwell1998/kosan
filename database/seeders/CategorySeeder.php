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
        Category::create(
            [
                "image"=>"assets/Logo.jpg",
                "name"=> "VVIP Class",
                "fasilitas"=> "Ada Tipi, Ada Banyak Sekali, Ada Saya",
                "priceDay"=> "150.000",
                "priceWeek"=> "500.000",
                "priceMonth"=> "1.200.000"
            ]
        );
        Category::create(
            [
                "image"=>"assets/Logo.jpg",
                "name"=> "Executive Class",
                "fasilitas"=> "Keren kali mak, Ada Banyak Sekali, Ada Saya",
                "priceDay"=> "160.000",
                "priceWeek"=> "600.000",
                "priceMonth"=> "1.600.000"
            ]
        );
        
    }
}
