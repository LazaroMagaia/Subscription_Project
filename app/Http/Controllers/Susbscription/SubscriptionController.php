<?php

namespace App\Http\Controllers\Susbscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    public function index(){
        if(auth()->user()->subscribed('default')){
            return redirect()->route('subscriptions.premium');
        }
        return view('subscriptions.index',[
            'intent'=> auth()->user()->createSetupIntent()
        ]);
    }

    public function store(Request $request){
        $request->user()->newSubscription('default','price_1JAIZzKo1madaYDQEu4NHZyb')
        ->create($request->token);
        return redirect()->route('subscriptions.premium');
    }
    public function premium(){
        return view('subscriptions.premium');
    }

    public function account(){
        $invoices = auth()->user()->invoices();//Historico das assinaturas do usuario
        return view('subscriptions.account', compact('invoices'));
    }

    public function invoiceDownload($id){
        return Auth::user()->downloadInvoice($id,[
            'vendor'=>config('app.name'),
            'product'=>'Assinatura Vip'
        ]);
    }
}
