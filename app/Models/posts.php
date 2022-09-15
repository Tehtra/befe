<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    protected $fillable = [
        'title',
        'content',
        'category',
        'created_at',
        'updated_at',
        'status'       
    ];
}
