<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    protected $table = "pesans";
    protected $guarded = [];
    protected $primaryKey = "id";
    protected $keyType = "string";

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
