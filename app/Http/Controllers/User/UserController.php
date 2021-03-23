<?php

namespace App\Http\Controllers\User;

use App\casereg_model;
use App\crime_model;
use App\DCB\ForwadAcceptCase;
use App\DCB\ReleaseCase;
use App\User;
use App\FineConsideration;
use App\CaseWithdrawRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;

class UserController extends Controller
{
    public function Dashboard(){
        $crime=crime_model::where('delete_status',1)->get();
        return view('user-side.dashboard',compact('crime'));
    }
    public function Logout(){
        Auth::logout();
        return redirect()->route('home-page');
    }
    public function LoginCheck(Request $request){
        $crime=crime_model::where('delete_status',1)->get();
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
//            'g-recaptcha-response' => 'required|captcha',
        ]);
        $code=rand(10,1000000);
        $email=$request->email;
        $password=$request->password;
        $user=User::where('vehicle_number',$email)->first();
        if ($user && Hash::check($password, $user->password)){
            $user->otp_code=$code;
            $user->save();
            return view('user-side.verify-login',compact('email','password','code','crime'));
        }else{
            Toastr::Error('You Have Something  Wrong','Error');
            return back();
        }
    }
    public function LoginCheckVerify(Request $request){
//        return $request;
        $email=$request->email;
        $password=$request->password;
        $user=User::where('vehicle_number',$email)->first();
        if ($user && $user->otp_code==$request->code){
            if (Hash::check($password, $user->password)) {
                if (Auth::attempt(['vehicle_number'=>$request->email, 'password' =>$request->password]))
                {
                    return redirect()->intended('/home');
                }
            }
        }else{
            return 'somethings wrong';
        }
    }
    public function Profile(){
        return view('user-side.profile.profile');
    }
    public function ProfileUpdate(Request $request){
//       return Auth::user()->id;
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'image' => '| image | mimes:jpeg,png,jpg | max:400',
        ]);
        $unit= User::findOrFail(Auth::user()->id);
        $unit->name=$request->name;
        $unit->email=$request->email;
        $unit->phone=$request->phone;
        $unit->address=$request->address;
        $image = $request->file('image');
        if(isset($image)){
            $imageName ='/user/image/'.uniqid().'.'.$image->getClientOriginalExtension();
            //for image unlink
            if(!empty($unit->image)) {
                if (file_exists(public_path( $unit->image))) {
                    unlink(public_path( $unit->image));
                }
            }
            $image->move(public_path().'/user/image', $imageName);
            $unit->image=$imageName;
        }
        if ($unit->save()){
            Toastr::success('update  User successful','Success');
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
                $user = User::find(Auth::user()->id);
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
    public function NewCase(){
        // return 'fdfdfd';
        $crime=crime_model::where('delete_status',1)->get();
         $case=casereg_model::with(['ForwadAcceptCase','CaseWithdrawRequest','ReleaseCase','unit','crimes'])->doesntHave('ReleaseCase')->select(['id','case_no','victim_name','loc','crime_type','paper','unit_id','forwared'])->with(['unit','crimes'])->where('user_id',Auth::user()->id)->where('drop_type',0)->where('delete_status',1)->get();

         return view('user-side.pages.new-case',compact('case','crime'));

    }
    public function OldCase(){

        $crime=crime_model::where('delete_status',1)->get();
         $case=casereg_model::with(['unit','crimes','ForwadAcceptCase','ReleaseCase'])->has('ReleaseCase')->has('ForwadAcceptCase')->where('user_id',Auth::user()->id)->where('forwared',1)->where('drop_type',0)->where('delete_status',1)->get();
        return view('user-side.pages.old-case',compact('case','crime'));
    }
    public function withDraw($id){
        $crime=crime_model::where('delete_status',1)->get();
        $case=casereg_model::with(['unit','crimes'])->where('id',$id)->where('user_id',Auth::user()->id)->where('forwared',1)->where('drop_type',0)->where('delete_status',1)->first();
        $total=0;
        $fine=FineConsideration::where('case_id',$case->id ?? '')->first();
        if($fine){
            $consider=$fine->amount;
        }else{
            $consider=0;
        }
      foreach (json_decode($case->crime_type) as $crimess){
          $crime_details=crime_model::findOrFail($crimess);
         $total+=$crime_details->fine_crime;
      }
      $forward_case=ForwadAcceptCase::where('case_id',$case->id)->where('accept_status',0)->where('forward_status',1)->where('drop_status',0)->where('delete_status',1)->get();
      $accept_case=ForwadAcceptCase::where('case_id',$case->id)->where('accept_status',1)->where('forward_status',1)->where('drop_status',0)->where('delete_status',1)->get();
      if(($forward_case && $accept_case)==true){
        return view('user-side.pages.withdraw-case',compact('case','crime','total','consider'));
    }else{
        Toastr::error('You have something wrong :)' ,'Error');
        return back();
    }

    }
    public function withdrawRequest(Request $request){

        $this->validate($request,[
            'payment_method'=>'required',
            'fine'=>'required',
            'service_charge'=>'required',
            'total'=>'required',
            'mobile_number'=>'required',
            'mobile_operator'=>'required',
            'tax_transaction_id'=>'required',
            'reference'=>'required',
            'courier_address'=>'required',
        ]);
        // return $request;
         $case=casereg_model::with(['unit','crimes'])->findOrFail($request->case_id);
         $forward_case=ForwadAcceptCase::where('case_id',$case->id)->where('accept_status',0)->where('forward_status',1)->where('drop_status',0)->where('delete_status',1)->get();
         $accept_case=ForwadAcceptCase::where('case_id',$case->id)->where('accept_status',1)->where('forward_status',1)->where('drop_status',0)->where('delete_status',1)->get();
         if(($forward_case && $accept_case)==true){
           $withdrawRequest=new CaseWithdrawRequest();
           $withdrawRequest->case_id=$request->case_id;
           $withdrawRequest->fine=$request->fine;
           $withdrawRequest->service_charge=$request->service_charge;
           $withdrawRequest->total=$request->total;
           $withdrawRequest->payment_method=$request->payment_method;
           $withdrawRequest->mobile_operator=$request->mobile_operator;
           $withdrawRequest->mobile_number=$request->mobile_number;
           $withdrawRequest->tax_transaction_id=$request->tax_transaction_id;
           $withdrawRequest->reference=$request->reference;
           $withdrawRequest->courier_address=$request->courier_address;
           $withdrawRequest->save();
           Toastr::success('Request success full :)' ,'Error');
            return redirect('/home');
         }else{
            Toastr::error('You have something wrong :)' ,'Error');
             return back();
         }

    }
    public function withdrawRequestUpdate(Request $request){


        $this->validate($request,[
            'payment_method'=>'required',
            'fine'=>'required',
            'service_charge'=>'required',
            'total'=>'required',
            'mobile_number'=>'required',
            'mobile_operator'=>'required',
            'tax_transaction_id'=>'required',
            'reference'=>'required',
            'courier_address'=>'required',
        ]);
        // return $request;
         $checkWithdra=CaseWithdrawRequest::findOrFail($request->withdraw_id);
         $case=casereg_model::with(['unit','crimes'])->findOrFail($request->case_id);

         if($checkWithdra->status=='1'){
            Toastr::error('You have something wrong :)' ,'Error');
             return back();
         }else{
            $withdrawRequest=$checkWithdra;
            $withdrawRequest->case_id=$request->case_id;
            $withdrawRequest->fine=$request->fine;
            $withdrawRequest->service_charge=$request->service_charge;
            $withdrawRequest->total=$request->total;
            $withdrawRequest->payment_method=$request->payment_method;
            $withdrawRequest->mobile_operator=$request->mobile_operator;
            $withdrawRequest->mobile_number=$request->mobile_number;
            $withdrawRequest->tax_transaction_id=$request->tax_transaction_id;
            $withdrawRequest->reference=$request->reference;
            $withdrawRequest->courier_address=$request->courier_address;
            $withdrawRequest->save();
            Toastr::success('Update success full :)' ,'Error');
            return back();
         }
        //  $case=casereg_model::with(['unit','crimes'])->findOrFail($request->case_id);
        //  $forward_case=ForwadAcceptCase::where('case_id',$case->id)->where('accept_status',0)->where('forward_status',1)->where('drop_status',0)->where('delete_status',1)->get();
        //  $accept_case=ForwadAcceptCase::where('case_id',$case->id)->where('accept_status',1)->where('forward_status',1)->where('drop_status',0)->where('delete_status',1)->get();
        //  if(($forward_case && $accept_case)==true){
        //    $withdrawRequest=CaseWithdrawRequest();
        //    $withdrawRequest->case_id=$request->case_id;
        //    $withdrawRequest->fine=$request->fine;
        //    $withdrawRequest->service_charge=$request->service_charge;
        //    $withdrawRequest->total=$request->total;
        //    $withdrawRequest->payment_method=$request->payment_method;
        //    $withdrawRequest->mobile_operator=$request->mobile_operator;
        //    $withdrawRequest->mobile_number=$request->mobile_number;
        //    $withdrawRequest->tax_transaction_id=$request->tax_transaction_id;
        //    $withdrawRequest->reference=$request->reference;
        //    $withdrawRequest->courier_address=$request->courier_address;
        //    $withdrawRequest->save();
        //    return 'ok';
        //  }else{
        //      return 'you have something wrong';
        //  }

    }
    public function withDrawCheck($id){
        $crime=crime_model::where('delete_status',1)->get();
        $case=casereg_model::with(['unit','crimes'])->where('id',$id)->where('user_id',Auth::user()->id)->where('forwared',1)->where('drop_status',0)->where('delete_status',1)->first();
        $total=0;
      foreach (json_decode($case->crime_type) as $crimess){
          $crime_details=crime_model::findOrFail($crimess);
         $total+=$crime_details->fine_crime;
      }
      $forward_case=ForwadAcceptCase::where('case_id',$case->id)->where('accept_status',0)->where('forward_status',1)->where('drop_status',0)->where('delete_status',1)->get();
      $accept_case=ForwadAcceptCase::where('case_id',$case->id)->where('accept_status',1)->where('forward_status',1)->where('drop_status',0)->where('delete_status',1)->get();
      $widrawReqeust=CaseWithdrawRequest::where('case_id',$case->id)->where('delete_status',1)->latest()->first();

      return view('user-side.pages.withdraw-case-check-edit',compact('case','crime','total','widrawReqeust'));
    }
}
