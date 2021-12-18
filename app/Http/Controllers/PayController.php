<?php

namespace App\Http\Controllers;

use Faker\Provider\ar_EG\Payment;
use Shetabit\Multipay\Invoice;
use Illuminate\Http\Request;

class PayController extends Controller
{
    public function purchase($id){
        $invoice=new Invoice();
        $invoice->amount(300);//megdar
        $payment =Payment();
        //::callbackUrl(route('purchase.result'));
        $payment->purchase($invoice,function($driver , $transactionId){

        });
        return $payment->pay()->render();
    }
}
