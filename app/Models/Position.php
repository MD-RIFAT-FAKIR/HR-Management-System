<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Position extends Model
{
    use HasFactory;

    protected $table = 'position'; //db table name
}