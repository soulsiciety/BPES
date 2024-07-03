<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RPerusahaan extends Model
{
    use HasFactory;

    public function jenisUsaha()
    {
        return $this->hasOne(MUsaha::class, 'id', 'usaha_id');
    }

    public function respondens()
    {
        return $this->hasMany(RResponden::class, 'perusahaan_id', 'id');
    }
}
