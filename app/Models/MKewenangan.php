<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MKewenangan extends Model
{
    use HasFactory;

    protected $table = 'm_kewenangan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ket_kewenangan',
    ];

    public $timestamps = true;
}
