<?php

namespace App\Http\Controllers;

use App\crime_model;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
        public function index(){
            $crime=crime_model::where('delete_status',1)->get();
            return view('welcome',compact('crime'));
        }
        public function UnitHome(){
            $auth=Auth::guard('unitauth')->user();
            if($auth){
                return redirect()->route('unitauth.home');
            }else{
                return redirect('/unitauth/login');
            }

        }
        public function SuperadminHome(){
            $auth=Auth::guard('superadmin')->user();
            if($auth){
                return redirect()->route('superadmin.home');
            }else{
                return redirect('/superadmin/login');
            }

        }
    }
