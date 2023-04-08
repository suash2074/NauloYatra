<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EsewaController extends Controller
{
    function esewaPay($id){
        $order  = Packages::findOrFail($id);
        return view('front.esewa-pay', compact('order'));
    }

    function esewaConfirm(Request $request){
        $user = Auth::user();
        if($request->success){

            $url = "https://uat.esewa.com.np/epay/transrec";
            $data = [
                'amt' => $request->amt,
                'rid' => $request->refId,
                'pid' => $request->oid,
                'scd' => 'EPAYTEST'
            ];

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);

            if ($response == 'failure')
                return "Invalid transaction";

            $user->cart->cartItems()->delete();
            $user->cart->save();
            $order = Packages::where('number',$request->oid)->first();
            $order->payment_status = "paid";
            $order->payment_ref = $request->refId;
            $order->save();

        return redirect()->route('front.home');

        }else{
            return "PAYMENT FAIL!!";
        }
    }
}