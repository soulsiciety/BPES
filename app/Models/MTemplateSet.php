<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MTemplateSet extends Model
{
    use HasFactory;

    public function pertanyaans()
    {
        return $this->hasMany(MTemplateSetPertanyaan::class, 'template_sets_id', 'id');
    }
}
