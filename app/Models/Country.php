<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries'; //db table name

}
