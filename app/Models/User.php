<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static public function getRecord() {
        $return = self::select('users.*');

        // search box start 
        if(!empty(Request::get('id'))) {
            $return = $return->where('id', '=', Request::get('id'));
        }
        if(!empty(Request::get('name'))) {
            $return = $return->where('name', 'like', '%'.Request::get('name').'%');
        }
        if(!empty(Request::get('last_name'))) {
            $return = $return->where('last_name', 'like', '%'.Request::get('last_name').'%');
        }
        if(!empty(Request::get('email'))) {
            $return = $return->where('email', 'like', '%'.Request::get('email').'%');
        }
        // search box end 

        $return = $return->orderBy('id', 'DESC')->paginate(20);

        return $return;
    }//

    //relation between user table and job tabe to get job's job_title
    public function get_job() {
       return $this->belongsTo(Job::class, 'job_id');
    }

    //relation between user model and manager model to get manager's name
    public function manager() {
        return $this->belongsTo(Manager::class,'manager_id');
    }
    //relation between user model and department model to get department's name
    public function department() {
        return $this->belongsTo(Department::class,'department_id');
    }
    //relation between user model and department model to get department's name
    public function position() {
        return $this->belongsTo(Position::class,'position_id');
    }
}
