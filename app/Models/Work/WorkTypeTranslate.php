<?php

namespace App\Models\Work;

use Illuminate\Database\Eloquent\Model;

class WorkTypeTranslate extends Model
{
    protected $fillable = [
        'lang',
        'title',
        'type_id',
    ];
}
