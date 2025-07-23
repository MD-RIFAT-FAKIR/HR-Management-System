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
        $return = self::select('job_grades.*')
        ->orderBy('id','desc')
        ->paginate(20);

        return $return;
    }
}