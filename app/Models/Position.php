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

              //search box
              if(!empty(Request::get('id'))) {
                $return = $return->where('position.id', '=', Request::get('id'));
              }
              if(!empty(Request::get('position_name'))) {
                $return = $return->where('position.position_name','like', '%'.Request::get('position_name').'%');
              }
               if(!empty(Request::get('daily_rate'))) {
                $return = $return->where('position.daily_rate', '=', Request::get('daily_rate'));
              }
               if(!empty(Request::get('monthly_rate'))) {
                $return = $return->where('position.monthly_rate', '=', Request::get('monthly_rate'));
              }
               if(!empty(Request::get('working_days_per_month'))) {
                $return = $return->where('position.working_days_per_month', '=', Request::get('working_days_per_month'));
              }
              //end search box

              $return = $return->paginate(20);
              return $return;
    }
}