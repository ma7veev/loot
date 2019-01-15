<?php
   
   namespace App\Http\Middleware;
   
   use Closure;
   use Illuminate\Support\Facades\Auth;
   
   class AuthConfirm extends Auth
   {
      /**
       * Handle an incoming request.
       *
       * @param  \Illuminate\Http\Request $request
       * @param  \Closure                 $next
       * @return mixed
       */
      public
      function handle($request, Closure $next)
      {
         if (Auth ::check())
         {
            if ( !Auth ::user() -> is_confirmed)
            {
               return redirect('confirmation');
            }
            
            return $next($request);
         }
      }
   }
