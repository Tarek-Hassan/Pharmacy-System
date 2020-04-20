<?php

namespace App\Http\Controllers;
use App\User;
use App\MedicineOrder;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    //(​ Male - Female Attendance​ ) ​ pie chart
    public function index()
    {
    // @TOP_Order_users_pie_Chart

        // to get the topOrder id && count(order) && DesOrder && Limit =10
        $topOrder = MedicineOrder::selectRaw("COUNT(*) as count,user_id")->groupBy('user_id')->orderByDesc('count')->limit(10)->pluck('count','user_id');
        // to get the name for each id   in topOrder array 
        $orderUsername=User::find(array_keys($topOrder->toArray()))->pluck('name');
        // to get the send number of Ordr for each user in topOrder array 
        $countOrder=array_values($topOrder->toArray());
        
    // @Male - Female Attendance​_pie_Chart
        $users = User::groupBy('gender')->selectRaw("COUNT(*) as count")->pluck('count');



        return view('statistics.index',compact('users','countOrder','orderUsername'));
    }
}
