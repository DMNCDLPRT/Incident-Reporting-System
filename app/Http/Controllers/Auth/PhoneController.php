<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isNull;

class PhoneController extends Controller
{
    public function viewVerifyPhone() {
        $user = Auth()->user();

        if($user->phone == null){
            dd('1');
            return view('profile.show')->with('message', 'Please save your Phone number before clicking get verifed');
        }
        
        if (isNull($user->verification_code)){
            $verify = new PhoneController;
            $verify->sendVerification();
            return view ('auth.verify-phone');
        }

        if ($user->phone_verified_at !== null){
            dd('3');
            return view ('auth.verify-phone');
        }
        return view ('auth.verify-phone');
    }

    public function sendVerification(){
        $user = Auth()->user();
        $six_digit_random_number = random_int(100000, 999999);

        if($user->phone == null) {
            return session()->flash('message', 'Please save your Phone number before clicking get verifed');
        }

        User::where('id', $user->id)->update([
            'verification_code' => $six_digit_random_number,
        ]);

        $message = "Use this code {$six_digit_random_number}";

         // SEMAPHORE - text messagin API
         $ch = curl_init();
         $parameters = array(
             'apikey' => env('SEMAPHORE_API_KEY'), // YOUR SEMAPHORE API KEY
             'number' => $user->phone,
             'message' => $message,
             'sendername' => 'SEMAPHORE'
         );

         curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
         curl_setopt( $ch, CURLOPT_POST, 1 );
 
         //Send the parameters set above with the request
         curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );
 
         // Receive response from server
         curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
         $output = curl_exec( $ch );
         curl_close ($ch);
    }
    
    public function verifyPhone(Request $request) {
        $user = Auth()->user();
  
        if($user->phone !== null && $user->verification_code !== null){
            if($request->phone == $user->verification_code) {
                User::where('id', $user->id)->update([
                    'phone_verified_at' => Carbon::now(),
                ]);
                return view ('profile.show')->with('message', 'Your phone number is now Verified!');
            }
        }

        return session('message', 'The Verification code did not match!');
    }
}
