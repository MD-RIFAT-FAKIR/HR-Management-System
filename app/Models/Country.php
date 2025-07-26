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
      $return = self::select('countries.*','regions.region_name')
                      ->join('regions','regions.id','=','countries.region_id')
                      ->orderBy('countries.id','desc');

      //search box
      if(!empty(Request::get('id'))) {
        $return = $return->where('countries.id', '=', Request::get('id'));
      }
      if(!empty(Request::get('country_name'))) {
        $return = $return->where('countries.country_name','like', '%'.Request::get('country_name') .'%');
      }
      if(!empty(Request::get('region_name'))) {
        $return = $return->where('regions.region_name','like','%'.Request::get('region_name').'%'); 
      }
      if(!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {  
        $return = $return->where('countries.created_at','>=', Request::get    ('start_date'))->where('countries.created_at', '<=', Request::get('end_date'));
      }
      //end search box

      $return = $return;

      return $return->paginate(20);
    }

    //relation between country model and region model inside country mode to get region's table region_name
    public function region() {
      return $this->belongsTo(Region::class, 'region_id');
    }

}
