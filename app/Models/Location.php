<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Location extends Model
{
    use HasFactory;

    protected $table = 'locations'; //db table name

    static public function getRecord ($request) {
      $return = self::select('locations.*', 'countries.country_name')
                     ->join('countries','countries.id','=','locations.country_id')->orderBy('locations.id','desc');

      //search box
         if(!empty($request->get('id'))) {
        $return = $return->where('locations.id', '=', $request->get('id'));
    }
    
    if(!empty($request->get('state_provice'))) {
        $return = $return->where('locations.state_provice','like', '%'.$request->get('state_provice').'%');
    }
    
    if(!empty($request->get('country_id'))) {
        $return = $return->where('countries.country_name','like', '%'.$request->get('country_id').'%');
    }
    
    if(!empty($request->get('created_at'))) {
        $return = $return->where('locations.created_at','like', '%'.$request->get('created_at').'%');
    }
    
    if(!empty($request->get('updated_at'))) {
        $return = $return->where('locations.updated_at','like', '%'.$request->get('updated_at').'%');
    }
    
    if(!empty($request->get('start_date')) && !empty($request->get('end_date'))) {
        $return = $return->where('locations.created_at', '>=', $request->get('start_date'))->where('locations.created_at', '<=', $request->get('end_date'));
    }
      //end search box

      $return = $return->paginate(20);

      return $return;
    }


}



?>