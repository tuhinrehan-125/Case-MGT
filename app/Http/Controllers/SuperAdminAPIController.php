<?php

namespace App\Http\Controllers;

use App\Unitauth;
use Illuminate\Http\Request;

class SuperAdminAPIController extends Controller
{

    public function allunituser(){
        $unituser=Unitauth::with('UnitRole')->where('delete_status',1)->orderBy('id','desc')->get();
        if(request()->ajax()){
            return datatables()->of($unituser)
                ->addColumn('button',function ($data){
                    return view('superadmin.pages.unit-user.unit-user-button',compact('data'));
                })
                ->addColumn('status',function ($data){
                    if ($data->status==1){
                        return '<p class="text-success"> Active</p>';
                    }else{
                        return '<p class="text-danger"> Inactive</p>';
                    }
                })
                ->addColumn('role',function ($data){
                    return $data->UnitRole->name;
                })
                ->addColumn('unit',function ($data){
                    return $data->Unit->name;
                })
                ->addIndexColumn()
                ->rawColumns(['button','sl','status','role','unit'])
                ->make(true);
        }
    }
}
