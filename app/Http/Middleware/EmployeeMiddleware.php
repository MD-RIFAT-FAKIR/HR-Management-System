<?php
namespace App\Http\Middleware;
use Closure;
use Auth;

class EmployeeMiddleware {

  public function handle($request, Closure $next) {
      if(Auth::check()) {
          if(Auth::user()->is_role == 0) {
            return $next($request);
          }else{
            Auth::logout();
            return redirect(url('/'));
          }
      }else{
        return redirect(url('/'));
      }
  }
  
}

?>