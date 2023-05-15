<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
// use App\Models\Package_details;
use App\Models\Packages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EsewaController extends Controller
{
    function esewaPay($id)
    {
        $booking = Bookings::findOrFail($id);
        return view('front.esewa.esewa', compact('booking'));
    }
    
    function esewaPayConfirm(Request $request)
    {
        // dd($request);    
        $user = Auth::user();
        if ($request->success) {
            $url = "https://uat.esewa.com.np/epay/transrec";
    // dd($url);

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
    
            if ($response == 'failure') {
            // return redirect()->route('about_us')->with('success', 'Payment Successful');
            return "Invalid transaction";
            }
    
            // $user->booking
            $booking = Bookings::where('number', $request->oid)->first();
            $booking->payment_status = "Paid";
            $booking->save();
    
            notify()->success('Payment Successful');
            return redirect()->route('user');
        } else {
            return "PAYMENT FAIL!!";
        }
    }    
    
}