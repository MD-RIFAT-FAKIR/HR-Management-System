<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries'; //db table name

    static public function getRecord ($request) {
      $return = self::select('countries.*');


      $return = $return->paginate(20);
      return $return;
    }

    //relation between country model and region model inside country mode to get region's table region_name
    public function region() {
      return $this->belongsTo(Region::class, 'region_id');
    }

}
