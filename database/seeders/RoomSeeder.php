<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create([
            "nomor_kamar"=> "01A",
            "category_id"=> 1
        ]);
        Room::create([
            "nomor_kamar"=> "01B",
            "category_id"=> 2
        ]);
        Room::create([
            "nomor_kamar"=> "03A",
            "category_id"=> 1
        ]);
        Room::create([
            "nomor_kamar"=> "02A",
            "category_id"=> 2
        ]);
    }
}
