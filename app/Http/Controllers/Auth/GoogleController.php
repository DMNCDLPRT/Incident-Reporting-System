<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;
// use File; 
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

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
            $avatar = $user->avatar_original . "&access_token={$user->token}";
     
            $finduser = User::where('google_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('portal/portal');
     
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'profile_photo_url' => $avatar,

                    // 'password' => encrypt('123456dummy')
                    //'password' => Hash::make($user['password']),
                ])->assignRole('user');
    
                Auth::login($newUser);
     
                return redirect('portal/portal');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage(), );
        }
    }
}
