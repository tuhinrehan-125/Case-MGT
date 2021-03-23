<?php

namespace App\Http\Controllers\DCB;

use App\casereg_model;
use App\DCB\ForwadAcceptCase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SuperAdminRole;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Unit;
use App\Models\UnitRole;
use App\Superadmin;
use App\Unitauth;
use App\User;
use Validator;
use DB;
use Yajra\Datatables\Datatables;

class DcbAdminController extends Controller
{
    public function index(){
        //    return Auth::user();
        $adminrole=SuperAdminRole::where('delete_status',1)->get();
        $admin=Superadmin::where('role_id','!=',1)->where('delete_status',1)->get();
        return view('superadmin.pages.admins.index',compact('adminrole','admin'));
    }
    public function adminStore(Request $request){
        //    return $request;
        $validator=Validator::make($request->all(),[
        'admin_role_id' => 'required|max:255',
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:superadmins',
        'password' => 'required|min:6|confirmed',
    ]);
        if ($validator->passes()) {
            $admin = new Superadmin();
            $admin->name = $request->name;
            $admin->role_id = $request->admin_role_id;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->password = Hash::make($request->password);
            if ($admin->save()) {
                return response(json_encode(['success' => 'Your data inserted Success full']));
                Toastr::success('Add admin User successful', 'Success');
                return back();
            } else {
                Toastr::error('You have Something wrong', 'information');
            }
        } else{
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        }
    public function adminFind(Request $request){
    return   $admin=Superadmin::findOrFail($request->id);
    }
    public function adminUpdate(Request $request){
        $admin=Superadmin::findOrFail($request->id);
        if (!empty($admin)){
            $admin->name=$request->name;
            $admin->role_id=$request->admin_role_id;
            $admin->phone=$request->phone;
            $admin->email=$request->email;
            $admin->status=0;
            $admin->password = Hash::make($request->password);
            $admin->save();
            Toastr::success('Admin update success','Success');
            return response(json_encode(['success' => 'Your data update Success full']));
        }else{
            return response(json_encode(['error' => 'You have something wrong']));
        }
    }

    public function adminDelete(Request $request){
        $admin=Superadmin::findOrFail($request->id);
        if ($admin->delete_status==1){
            $admin->delete_status=0;
            $admin->status=0;
        }else{
            $admin->delete_status=1;
            $admin->status=1;
        }
        $admin->save();
        return response(json_encode(['success' => 'Your data Update Success full']));
    }
    public function adminActive(Request $request){
        $admin=Superadmin::findOrFail($request->id);
        if ($admin->status==1){
            $admin->status=0;
        }else{
            $admin->status=1;
        }
        $admin->save();
        return response(json_encode(['success' => 'Your data Delete Success full']));
    }
    public function AdminUser(){
        $admins=Superadmin::with('SuperAdminRole')->where('role_id','!=',Auth::guard('superadmin')->user()->role_id)->where('delete_status',1)->orderBy('id','desc')->get();
        if(request()->ajax()){
            return datatables()->of($admins)
                ->addColumn('button',function ($data){
                    return view('superadmin.pages.admins.admin-button',compact('data'));
                })
                ->addColumn('status',function ($data){
                    if ($data->status==1){
                        return '<p class="text-success"> Active</p>';
                    }else{
                        return '<p class="text-danger"> Inactive</p>';
                    }
                })
                ->addColumn('role',function ($data){
                    return $data->SuperAdminRole->name;
                })
                ->addIndexColumn()
                ->rawColumns(['button','sl','status','role'])
                ->make(true);
        }
    }
    public function VehicleTracking(){
            $case=User::with(['Case'=>function($q){
                        $q->select(['id','id_mp','user_id'])->where('delete_status',1)->where('forwared',1);
                    }
                    ])->select(['id','name','phone','vehicle_number'])
                    ->where('delete_status',1)->get()->sortByDesc(function($qr) {
                        return $qr->Case->count();
                    });

        return view('superadmin.pages.vehicle_track.index',compact('case'));
    }
    public function Users(){
         $users=User::where('delete_status',1)->select(['id','name','phone','email','status','address','vehicle_number'])->get();
        if(request()->ajax()){
            return datatables()->of($users)
                ->addColumn('button',function ($data){
                    return view('superadmin.pages.users.user-button',compact('data'));
                })
                ->addColumn('status',function ($data){
                    if ($data->status==1){
                        return '<p class="text-success"> Active</p>';
                    }else{
                        return '<p class="text-danger"> Inactive</p>';
                    }
                })
                ->addIndexColumn()
                ->rawColumns(['button','sl','status'])
                ->make(true);
        }
    }

    public function userUpdate(Request $request){
        // return $request;
        $user=User::findOrFail($request->id);
        if (!empty($user)){
            $user->name=$request->name;
            $user->phone=$request->phone;
            $user->email=$request->email;
            $user->address=$request->address;
            $user->vehicle_number=$request->vehicle_number;
            $user->password = Hash::make($request->password);
            $user->save();
            Toastr::success('user update success','Success');
            return response(json_encode(['success' => 'Your data update Success full']));
        }else{
            return response(json_encode(['error' => 'You have something wrong']));
        }
    }

    public function userDelete(Request $request){
         $user=User::findOrFail($request->id);
        if ($user->delete_status==1){
            $user->delete_status=0;
            $user->status=0;
        }else{
            $user->delete_status=1;
            $user->status=1;
        }
        $user->save();
        return response(json_encode(['success' => 'Your data Update Success full']));
    }
    public function userActive(Request $request){
        // return $request;
        $user=User::findOrFail($request->id);
        if ($user->status==1){
            $user->status=0;
        }else{
            $user->status=1;
        }
        $user->save();
        return response(json_encode(['success' => 'Your data Delete Success full']));
    }
}
