<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Region extends Model
{
    use HasFactory;

    protected $table = 'regions'; //db table name

    static public function getRecord($request) {
      $return = self::select('regions.*')->orderBy('id','desc')->get();



      

      return $return;
    }
}


?>