<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments'; //db table name

    static public function getRecord($request) {
      $return = self::select('departments.*', 'locations.street_address')
                ->join('locations','locations.id','=','departments.location_id')
                ->orderBy('id','desc');




                $return = $return->paginate(20);

                return $return;
    }

}