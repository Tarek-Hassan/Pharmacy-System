<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Cog\Contracts\Ban\Bannable as BannableContract;
class ForbidBannedUserCustom
{
/**

* The Guard implementation.

*

* @var IlluminateContractsAuthGuard

*/

protected $auth;



/**

* @param IlluminateContractsAuthGuard $auth

*/

public function __construct(Guard $auth)

{

$this->auth = $auth;

}


/**
* Handle an incoming request.
*
* @param \Illuminate\Http\Request $request
* @param \Closure $next
* @return mixed
*/
public function handle($request, Closure $next)
{
$user = $this->auth->user();



if ($user && $user instanceof BannableContract && $user->isBanned()) {

$request->session()->flush();

return redirect('login')->withInput()->withErrors([

'email' => 'This account is blocked.',

]);

}



return $next($request); 
}
}