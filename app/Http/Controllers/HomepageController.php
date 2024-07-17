<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Room;
use App\Models\Tenant;
use Illuminate\Http\Request;

class HomepageController
{
    public function index()
    {
        $categories = Category::whereHas('room')->get();

        foreach($categories as $category){
            $availbleRooms = Room::with('payments')
            ->where('category_id',$category->id)
            ->whereDoesntHave('payment')
            ->count();

            if($availbleRooms>0){
                $category['available_rooms'] = "Tersedia";
            }else{
                $category['available_rooms']= "Tidak Tersedia";
            }
        }

        return view('index', compact('categories'));
    }
}
