<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
// use App\Models\Package_details;
use App\Models\Packages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EsewaController extends Controller
{
    function esewaPay($id){
        $booking  = Bookings::findOrFail($id);
        return view('front.esewa.esewa', compact('booking'));
    }

    function esewaConfirm(Request $request){
        // return $request->all();
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

            $booking = Bookings::where('number',$request->oid)->first();
            $booking->payment_status = "Paid";
            // $booking->advance_payment = $request->amt;
            // $booking->payment_ref = $request->refId;
            $booking->save();

        // return redirect()->view('front.home.home');
        // return redirect()->route('packages');
        return redirect()->back();


        }else{
            return "PAYMENT FAIL!!";
        }
    }
}