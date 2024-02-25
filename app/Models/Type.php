<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Type extends Model
{
    use HasFactory;

    public function input(): BelongsTo
    {
        return $this->belongsTo(InputField::class, 'input_field', 'id');
    }  
}
