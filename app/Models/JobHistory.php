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
        $return = self::select('job_history.*')->orderBy('id', 'DESC')->paginate(20);
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

}

