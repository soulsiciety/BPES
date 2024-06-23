<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MJawaban extends Model
{
    use HasFactory;

    public function usaha()
    {
        return $this->hasOne(MUsaha::class, 'id', 'kode_usaha');
    }
}
