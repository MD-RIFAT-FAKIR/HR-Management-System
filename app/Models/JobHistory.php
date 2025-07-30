<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class JobHistory extends Model
{
    use HasFactory;

    protected $table = 'job_history'; //db table name

    static public function getRecord($request) {
    
        $return = self::select('job_history.*', 'users.name', 'jobs.job_title', 'users.last_name','departments.department_name')
            ->join('users', 'users.id', '=', 'job_history.employee_id')
            ->join('jobs', 'jobs.id', '=', 'job_history.job_id')
            ->join('departments','departments.id','=','job_history.department_id')
            ->orderBy('job_history.id', 'DESC');

        if(!empty(Request::get('id'))) {
            $return = $return->where('job_history.id', '=', Request::get('id'));
        }
        if(!empty(Request::get('name'))) {
            $return = $return->where('users.name', 'like', '%'.Request::get('name').'%');
        }
        if(!empty(Request::get('start_date'))) {
            $return = $return->where('job_history.start_date', '=', Request::get('start_date'));
        }
        if(!empty(Request::get('end_date'))) {
            $return = $return->where('job_history.end_date', '=', Request::get('end_date'));
        }
        if(!empty(Request::get('job_title'))) {
            $return = $return->where('jobs.job_title', '=', Request::get('job_title'));
        }
        if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $return = $return->whereDate('job_history.start_date', '>=', Request::get('start_date'))
                     ->whereDate('job_history.end_date', '<=', Request::get('end_date'));
        } elseif (!empty(Request::get('start_date'))) {
            $return = $return->whereDate('job_history.start_date', '>=', Request::get('start_date'));
        } elseif (!empty(Request::get('end_date'))) {
            $return = $return->whereDate('job_history.end_date', '<=', Request::get('end_date'));
        }
 
            
        $return = $return->paginate(20);

        return $return;

    }
 
    //relation between jobhistory and user mode to get user name
    public function user() {
        return $this->belongsTo(User::class, 'employee_id'); 
    }
    //relation between jobhistory and job mode to get job title
    public function job() {
        return $this->belongsTo(Job::class, 'job_id');
    }

    //relation between jobHistory mode and department model to get department_name
    public function department() {
        return $this->belongsTo(Department::class,'department_id');
    }

}

