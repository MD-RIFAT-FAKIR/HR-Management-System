<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Position extends Model
{
    use HasFactory;

    protected $table = 'position'; //db table name

    static public function getRecord($request) {
      $return = self::select('position.*')
              ->orderBy('id','desc');


              $return = $return->paginate(20);
              return $return;
    }
}