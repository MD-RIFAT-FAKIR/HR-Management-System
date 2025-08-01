<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class JobGrade extends Model
{
    use HasFactory;

    protected $table = 'job_grades'; //db table name

    static public function getRecord($request) {
        $return = self::select('job_grades.*');

        //search box filter
        if(!empty(Request::get('id'))) {
            $return = $return->where('id', '=', Request::get('id'));
        }
        if(!empty(Request::get('grade_level'))) {
            $return = $return->where('grade_level', 'like', '%'.Request::get('grade_level').'%');
        }
        if(!empty(Request::get('lowest_sal'))) {
            $return = $return->where('lowest_sal', 'like', '%'.Request::get('lowest_sal').'%');
        }
        if(!empty(Request::get('highest_sal'))) {
            $return = $return->where('highest_sal', 'like', '%'.Request::get('highest_sal').'%');
        }
        if(!empty(Request::get('created_at'))) {
            $return = $return->where('created_at', 'like', '%'.Request::get('created_at').'%');
        }
        if(!empty(Request::get('updated_at'))) {
            $return = $return->where('updated_at', 'like', '%'.Request::get('updated_at').'%');
        }
        //end search box filter

        $return = $return->orderBy('id','desc')->paginate(20);

        return $return;
    }
}