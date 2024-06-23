<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPertanyaan extends Model
{
    use HasFactory;

    public function jawabans()
    {
        return $this->hasMany(MJawaban::class, 'jenis_jawaban', 'jenis_jawaban');
    }
}
