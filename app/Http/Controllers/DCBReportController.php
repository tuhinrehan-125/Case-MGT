<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\casereg_model;
use App\crime_model;
use App\DCB\Accounts;
use App\DCB\Box;
use App\DCB\DCBDrop;
use App\DCB\ForwadAcceptCase;
use App\DCB\ReleaseCase;
use App\Models\Unit;
use App\Models\UnitRole;
use App\Unitauth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Validator;
use DateTime;
use DatePeriod;
use DateInterval;
class DCBReportController extends Controller
{
   public function currentmonth(){

       return view('superadmin.pages.reports.current-report');
   }
   public function MonthlyReport(){
      $list=array();
      for($d=01; $d<=12; $d++)
      {
            $list[]=$d;
      }
      $unit=Unit::where('delete_status',1)->get();
      $forward=ForwadAcceptCase::where('delete_status',1)->get();
      $release=ReleaseCase::where('delete_status',1)->get();
      $account=Accounts::where('delete_status',1)->get();
   return view('superadmin.pages.reports.monthly-report',compact('list','forward','unit','release','account'));
   }
   public function CustomReportDate(Request $request){
    $dateFrom=$request->from_date;
    $dateTo=$request->to_date;
    $startDate  = new DateTime($dateFrom);
    $interval   = new DateInterval('P1D'); // One day
    $endData    = new DateTime($request->to_date);
    $endData    = $endData->modify( '+1 day' );
    $list     = new DatePeriod($startDate, $interval, $endData);

    $unit=Unit::where('delete_status',1)->get();
    $forward=ForwadAcceptCase::where('delete_status',1)->get();
    $release=ReleaseCase::where('delete_status',1)->get();
    $account=Accounts::where('delete_status',1)->get();
    return view('superadmin.pages.reports.custom-report',compact('list','forward','unit','release','account','dateFrom','dateTo'));
   }
   public function currentMonthAPIReport(){

    $startDate  = new DateTime(date('Y-m-01'));
    $interval   = new DateInterval('P1D'); // One day
    $endData    = new DateTime(date('Y-m-d'));
    $endData    = $endData->modify( '+1 day' );
    $period     = new DatePeriod($startDate, $interval, $endData);

    $unit=Unit::where('delete_status',1)->get();
    $forward=ForwadAcceptCase::where('delete_status',1)->get();
    $release=ReleaseCase::where('delete_status',1)->get();
    $account=Accounts::where('delete_status',1)->get();
    return view('superadmin.pages.reports.current-table',compact('period','forward','unit','release','account'));

   }
}
