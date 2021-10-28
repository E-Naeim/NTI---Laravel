<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class to_do extends Model
{
    use HasFactory;

    protected $table = 'to_do';
    protected $fillable = ['id', 'user_id', 'title', 'description', 'start_date', 'end_date'];
}
