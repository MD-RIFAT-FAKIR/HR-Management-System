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
      if(!empty($request->get('id'))) {
        $return = $return->where('manager.id','=', $request->get('id'));
      }
      if(!empty($request->get('manager_name'))) {
        $return = $return->where('manager.manager_name','like', '%'.$request->get('manager_name').'%');
      }
      if(!empty($request->get('manager_email'))) {
        $return = $return->where('manager.manager_email','like', '%'.$request->get('manager_email').'%');
      }
      if(!empty($request->get('manager_mobile'))) {
        $return = $return->where('manager.manager_mobile','like', '%'.$request->get('manager_mobile').'%');
      }
      //end search box

      $return = $return->paginate(20);
      return $return;
    }

}






?>