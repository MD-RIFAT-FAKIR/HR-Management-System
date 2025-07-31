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

                 $return = $return->paginate(20);

                  return $return;


    }

}