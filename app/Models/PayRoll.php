<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class PayRoll extends Model
{
    use HasFactory;

    protected $table = 'payroll'; //db table name

    static public function getRecord($request) {

        $return = self::select('payroll.*', 'users.name')
                  ->join('users','users.id', '=', 'payroll.employee_id')
                  ->orderBy('payroll.id' , 'desc');

                if(!empty(Request::get('id'))) {
                    $return = $return->where('payroll.id', '=', Request::get('id'));
                }
                if(!empty(Request::get('employee_id'))) {
                    $return = $return->where('users.name','like', '%'.Request::get('employee_id').'%');
                }
                if(!empty(Request::get('number_of_day_work'))) {
                    $return = $return->where('payroll.number_of_day_work','like', '%'.Request::get('number_of_day_work').'%');
                }
                if(!empty(Request::get('bonus'))) {
                    $return = $return->where('payroll.bonus','like', '%'.Request::get('bonus').'%');
                }
                if(!empty(Request::get('over_time'))) {
                    $return = $return->where('payroll.over_time','like', '%'.Request::get('over_time').'%');
                }



                 $return = $return->paginate(20);

                  return $return;


    }

    public function user() {
        return $this->belongsTo(User::class, 'employee_id');
    }

}