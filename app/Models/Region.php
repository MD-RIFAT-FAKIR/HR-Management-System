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
      $return = self::select('regions.*')->orderBy('id','desc');

      //search box
      if(!empty(Request::get('id'))) {
        $return->where('id', '=', Request::get('id'));
      }
      if(!empty(Request::get('region_name'))) {
        $return->where('region_name','like', '%'.Request::get('') .'%');
      }
      //end search box

      $return = $return->paginate(20);

      return $return;
    }
}


?>