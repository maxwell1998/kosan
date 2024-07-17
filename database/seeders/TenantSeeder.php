<?php

namespace Database\Seeders;

use App\Models\Tenant;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tenant::create(
        //     [
        //         "room_id" => 1,
        //         "name"=> "Andika Pratama",
        //         "no_hp"=> "082168973387",
        //         "alamat"=> "Pondok Pratama III Blok E no 11 Lubuk Buaya",
        //         "jmlh_anggota"=> 1,
        //         "tgl_masuk" => "2024-06-01",
        //         "tgl_keluar" => "2024-06-15",
        //         "biaya" => 600000,
        //         "status"=>"menunggu"
        //     ]
        // );
        // Tenant::create(
        //     [
        //         "room_id" => 2,
        //         "name"=> "Olga Mucini",
        //         "no_hp"=> "083168978787",
        //         "alamat"=> "Jalan Khatib No 14 Ulak Karang",
        //         "jmlh_anggota"=> 3,
        //         "tgl_masuk" => "2024-06-07",
        //         "tgl_keluar" => "2024-06-10",
        //         "biaya" => 300000,
        //         "status" => "menunggu"
        //     ]
        // );
        // Tenant::create(
        //     [
        //         "room_id" => 3,
        //         "name"=> "Silvia Rahmadona",
        //         "no_hp"=> "089266781299",
        //         "alamat"=> "Komplek Abrasi Pemda Lubuk Buaya",
        //         "jmlh_anggota"=> 2,
        //         "tgl_masuk" => "2024-06-01",
        //         "tgl_keluar" => "2024-06-25",
        //         "biaya" => 1000000,
        //         "status"=> "aktif"
        //     ]
        // );
        // // Tenant::create(
        // //     [
        // //         "name"=> "Silvia Saputra",
        // //         "no_hp"=> "089265581299",
        // //         "alamat"=> "Komplek Abrasi Pemda Lubuk Buaya",
        // //         "jmlh_anggota"=> 1
        // //     ]
        // // );
    }
}
