<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UDText extends Model
{
    use HasFactory;

    protected $fillable = ['field', 'text'];
}
