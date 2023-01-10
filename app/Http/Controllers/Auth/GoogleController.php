<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()      // this function direct go to google
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()  // this function get user login of googlre
    {
        try {
            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();
     
            if($finduser){
                Auth::login($finduser);
    
                return redirect('portal/portal');
     
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'profile_photo_url' => $user->getAvatar(),
                ])->assignRole('user');
    
                Auth::login($newUser);
    
                return redirect('portal/portal');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
