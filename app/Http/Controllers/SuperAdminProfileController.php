<?php

namespace App\Http\Controllers;

use App\Superadmin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SuperAdminProfileController extends Controller
{
    public function profile(){
        return view('superadmin.profile.index');
    }
    public function ProfileUpdate(Request $request){
//       return $request;
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'image' => '| image | mimes:jpeg,png,jpg | max:400',
        ]);
        $unit= Superadmin::findOrFail(Auth::user()->id);
        $unit->name=$request->name;
        $unit->email=$request->email;
        $unit->phone=$request->phone;
        $image = $request->file('image');
        if(isset($image)){
            $imageName ='/super-admin/image/'.uniqid().'.'.$image->getClientOriginalExtension();
            //for image unlink
            if(!empty($unit->image)) {
                if (file_exists(public_path( $unit->image))) {
                    unlink(public_path( $unit->image));
                }
            }
            $image->move(public_path().'/super-admin/image', $imageName);
            $unit->image=$imageName;
        }
        if ($unit->save()){
            Toastr::success('update Unit User successful','Success');
            return back();
        }else{

            Toastr::error('You have Something wrong','information');
            return back();
        }
    }
    public function ProfilePasswordUpdate(Request $request){
        $this->validate($request, [
            'oldPassword' => 'required',
            'password' => 'required|confirmed'
        ]);
        $hashedPassword = Auth::user()->password;
//       return 'ok';
        if (Hash::check($request->oldPassword, $hashedPassword))
        {

            if (!Hash::check($request->password,$hashedPassword))
            {
                $user = Superadmin::find(Auth::user()->id);
                $user->password = Hash::make($request->password);
                $user->save();
                Toastr::success('Password Successfully Changed :)' ,'Success');
                Auth::logout();
                return back();
//               return redirect()->route('login');
            }else{
                Toastr::error('New Password can not be same as old password :)' ,'Error');
                return redirect()->back();
            }
        }else{
            Toastr::error('Current Password does match. :)' ,'Error');
            return redirect()->back();
        }

    }
}
