<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = "bookings";
    protected $guarded = [];
    public $incrementing = false;
    protected $primaryKey = 'perumahan_id';
    protected $keyType = 'string';

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function perumahans()
    {
        return $this->belongsTo(User::class);
    }
}
