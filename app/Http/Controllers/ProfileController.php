<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use App\Mail\SendOtp;
use App\Models\EmailOtp;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    public function profile(){
        $user = User::whereId(auth()->user()->id)->first();
        //dd($user);
        return view('profile.index',[
            'user' => $user,
        ]);
    }

    public function changePassword(){
        return view('profile.change-password');
    }

    public function confirmOTPform(){

        if (auth()->user()->otp->count() <= 0) {
            return redirect()->route('profile');
        }
        return view('profile.confirm-otp');
    }

    public function validateOtp(Request $request)
    {
        $otp = EmailOtp::where(['user_id' => auth()->user()->id, 'otp' => $request->otp])->first();
        if ($otp != null) {
            auth()->user()->update([
                'password' => Hash::make(session('new_password'))
            ]);
            # delete otp
            $otp->delete();
            return redirect()->route('home');
        }else{
            return back()->withError('Incorrect OTP');
        }
    }

    public function validatePassword(Request $request){
        # Validation
        //dd($request->all());
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        # send email OTP to the user
                # create otp
                $otp = rand(10, 9999);
                # save otp
                EmailOtp::create([
                    'user_id' => auth()->user()->id, 
                    'otp' => $otp
                ]);
                # save new password inside a session
                session(['new_password' => $request->new_password]);
                # send otp
                if (Mail::to(auth()->user()->email)->send(new SendOtp($otp))) {
                    return redirect()->route('confirm-otp');
                }else{
                    dd('an error occured');
                }
   

        #Update the new Password
        // User::whereId(auth()->user()->id)->update([
        //     'password' => Hash::make($request->new_password)
        // ]);

        // return back()->with("status", "Password changed successfully!");
    }


}
