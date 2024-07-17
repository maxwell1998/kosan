<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function payment(){
        return $this->hasMany(Payment::class);
    }
}
