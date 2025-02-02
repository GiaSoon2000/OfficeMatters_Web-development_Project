<?php

namespace App\Http\Controllers;

use Stripe;

use Illuminate\Http\Request;
use Notification;
use App\Models\CartItem; 

class PaymentController extends Controller
{
    public function paymentPost(Request $request)
    {
	       
	Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->sub*100,   // RM10  10=10 cen 10*100=1000 cen
                "currency" => "MYR",
                "source" => $request->stripeToken,
                "description" => "Payment receive for Office Matters cart",
        ]);
           
        $email='b220107b@sc.edu.my';
        Notification :: route('mail', $email)->notify(new
        \App\Notifications\orderPaid($email));

        return back();
    }
}
