<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Location extends Model
{
    use HasFactory;

    protected $table = 'locations'; //db table name

    static public function getRecord($request) {
      $return = self::select('locations.*', 'countries.country_name')
                     ->join('countries','countries.id','=','locations.country_id')->orderBy('locations.id','desc');



      $return = $return->paginate(20);

      return $return;
    }


}



?>