<?php

namespace App\Models;

use App\Models\Tenant;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tenant(){
        return $this->belongsTo(Tenant::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }
}
