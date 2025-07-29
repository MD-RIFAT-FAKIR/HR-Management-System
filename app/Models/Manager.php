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


      $return = $return->paginate(20);
      return $return;
    }

}






?>