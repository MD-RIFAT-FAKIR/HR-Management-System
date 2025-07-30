<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Manager extends Model
{
    use HasFactory;

    protected $table = 'manager'; //db table name

    static public function getRecord($request) {
      $return = self::select('manager.*')->orderBy('manager.id', 'desc');

      //search box
      if(!empty(Request::get('id'))) {
        $return = $return->where('manager.id','=', Request::get('id'));
      }
      if(!empty(Request::get('manager_name'))) {
        $return = $return->where('manager.manager_name','like', '%'.Request::get('manager_name').'%');
      }
      if(!empty(Request::get('manager_email'))) {
        $return = $return->where('manager.manager_email','like', '%'.Request::get('manager_email').'%');
      }
      if(!empty(Request::get('manager_mobile'))) {
        $return = $return->where('manager.manager_mobile','like', '%'.Request::get('manager_mobile').'%');
      }
      if(!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
        $return = $return->where('manager.created_at','>=', Request::get('start_date'))->where('manager.created_at', '<=', Request::get('end_date'));
      }
      //end search box

      $return = $return->paginate(20);
      return $return;
    }

}






?>