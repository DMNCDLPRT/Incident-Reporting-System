<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RegisterStepTwoController extends Controller
{
    public function create(){

        return view('auth.register-step2');
    }

    public function store(Request $request){

        $input = $request->all();

        Validator::make($input, [
            'region' => ['required', 'string'],
            'province' => ['required', 'string'],
            'city' => ['required', 'string'],
            'barangay' => ['required', 'string'],
        ])->validate();

        return DB::transaction(function () use ($input) {
            $user = User::where('id', auth()->user()->id)->first();

            tap($user->update([
                'region' => $input['region'],
                'province' => $input['province'],
                'city' => $input['city'],
                'barangay' => $input['barangay']
            ]));

            return view('dashboard');
        });
            
    }
}
