<?php

namespace App\Http\Controllers;
// use App\Jobs\SendEmail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }
//     public function enqueue(Request $request)
// {
//      $details = ['email' => 'recipient@example.com'];
//     //  SendEmail::dispatch($details);
//      SendEmail::dispatchNow($details);
// }
}
