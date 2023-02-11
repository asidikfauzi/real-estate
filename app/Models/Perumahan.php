<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perumahan extends Model
{
    use HasFactory;

    protected $table = "perumahans";
    protected $guarded = [];
    protected $primaryKey = "id";
    protected $keyType = "string";

    public function bookings(){
    	return $this->hasMany(Booking::class);
    }
}
