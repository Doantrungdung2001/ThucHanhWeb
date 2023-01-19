<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use App\Mail\SendOtp;
use App\Mail\SendEmailChangePass;

use App\Models\EmailOtp;
#use App\Models\EmailChangeEmail;

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

    public function sendChangeEmail(){
        #send email
        
        if(Mail::to(auth()->user()->email)->send(new SendEmailChangePass())){
            return back()->with("status", "Đã gửi mail thay đổi");
            //return redirect()->route('profile');
        }
       
    }

    public function changeEmail(){
        return view('profile.change-email');
    }

    public function validateEmail(Request $request){
        $request->validate([
            'email' => 'required|email|unique:users',
        ]);
        
        User::whereId(auth()->user()->id)->update([
            'email' => $request->email
        ]);
        return redirect()->route('profile')->with("status", "Đã thay đổi email thành công !!!");

    }

    public function editInfor(){
        $user = User::whereId(auth()->user()->id)->first();

        return view('profile.edit-infor',[
            'user' => $user,
        ]);
    }

    public function validateInfor(Request $request){
        $request->validate([
            'name' => 'required|max:30',
            'ho_va_ten' => 'required|max:30',
            'dia_chi' => 'required|max:50',
            'sdt' => 'required|numeric|digits:10',
        ]);

        User::whereId(auth()->user()->id)->update([
            'name' => $request->name,
            'ho_va_ten' =>$request->ho_va_ten,
            'dia_chi' =>$request->dia_chi,
            'sdt' =>$request->sdt,
        ]);
        return redirect()->route('profile')->with("status", "Đã thay đổi thông tin thành công !!!");
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
            return redirect()->route('profile')->with("status", "Đã thay đổi mật khẩu thành công !!!");
        }else{
            return back()->withError('Incorrect OTP');
        }
    }

    public function validatePassword(Request $request){
        # Validation
        //dd($request->all());
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8|different:old_password',
            
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
