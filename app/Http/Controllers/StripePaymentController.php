<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session ;
use Illuminate\Http\Request;
use Stripe;
use App\VisaCard;
use DataTables;

class StripePaymentController extends Controller
{
    //
    public function index(Request $request)
    {
        // 1-change the model name
        //  2-change the href of the edit to be (modelName/$row->id/edit)
        
        if ($request->ajax()) {
            $data = VisaCard::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        // $button  = '<a href="" class="edit btn btn-primary btn-sm">View</a>';
                        // $button = '&nbsp;&nbsp;&nbsp;<a href="areas/'.$row->id.'/edit" class="edit btn btn-secondary btn-sm">Edite</a>';
                        $button= '&nbsp;&nbsp;&nbsp;<a  data-id="'.$row->id.'" class="del btn btn-danger btn-sm "  data-toggle="modal"data-target="#delete">Delete</a>';
            return $button;
                    })
                    ->addColumn('username', function($row){return $row->user->name;})
                    ->addColumn('amount', function($row){return $row->amount/100.0;})
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('payment.index');
    }
    public function stripe()
    {
        return view('payment.create');
    }

    public function storeCardInfo(Request $request){
        
        $request['exp_date']=$request['exp_month']."/".$request['exp_year'];
        VisaCard::create($request->all());
    }
    public function stripePost(Request $request)
    {
        // dd($request);
        // convert rom Cent To Dollar (Cent/100)
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->amount/100.0,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from Pharmacy" 
        ]);
        $this->storeCardInfo($request);
        return redirect()->back()->withSuccess('Payment successful!'); 
    }
    public function destroy($id) {
        $visacard=VisaCard::find($id)->delete();
        return redirect()->route('stripe.index');
    }


}
