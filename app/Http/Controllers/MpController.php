<?php

namespace App\Http\Controllers;

use App\casereg_model;
use App\crime_model;
use App\location_model;
use App\paper_model;
use App\Unitauth;
use App\User;
use App\vehicle_model;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MpController extends Controller
{
    //
    public function case_register_home()
    {
        $location = location_model::where('delete_status', 1)->where('unit_id', Auth::user()->unit_id)->get();
        $vehicle = vehicle_model::where('delete_status', 1)->get();
        $crime = crime_model::where('delete_status', 1)->get();
        $papers = paper_model::where('delete_status', 1)->get();
        return view('unitauth.mp-admin.case_register', compact('location', 'vehicle', 'crime', 'papers'));
    }
    public function registercase_store(Request $request)
    {
        //    return $request;
        //        return Auth::user()->unit_id;
        //        dd($request);
        $unit = Auth::user()->unit_id;
        $case_model = casereg_model::where('unit_id', $unit)->latest()->first();
        //    return   $caseNo=$case_model->case_no+1;
        $validator = Validator::make($request->all(), [
            'packet_number' => 'required|unique:casereg',
            'case_no' => 'required|unique:casereg',
            'vehical_reg' => 'required',
        ]);
        $code = rand(10, 1000000);
        if ($validator->passes()) {
            $data = new casereg_model();
            if (!empty($request->vehical_reg)) {
                $user = User::where('vehicle_number', $request->vehical_reg)->first();
                if (empty($user)) {
                    $userData = new User();
                    $userData->vehicle_number = $request->vehical_reg;
                    $userData->password = Hash::make('12345678');
                    $userData->save();
                    $data->user_id = $userData->id;
                    $data->victim_name = $request->victim_name;
                    $data->victim_mb = $request->victim_mb;
                } else {
                    $data->user_id =   $user->id;
                    if ((empty($request->victim_name) or empty($data->victim_mb = $user->phone))) {
                        $data->victim_name = $user->name;
                        $data->victim_mb = $user->phone;
                    } else {
                        $data->victim_name = $request->victim_name;
                        $data->victim_mb = $request->victim_mb;
                    }
                }
            }
            if (Auth::user()->unit_role_id == 2) {
                $data->id_mp = $request->id_mp;
            } else {
                $data->id_mp = Auth::user()->id;
            }
            $data->packet_number = $request->packet_number;
            $data->case_no = $request->case_no;

            $data->vehical_reg = $request->vehical_reg;
            $data->date_off = $request->date_off;
            $data->time_off = $request->time_off;
            $data->date_disposal = $request->date_disposal;
            $data->time_disposal = $request->time_disposal;
            $data->loc = $request->loc;
            $data->vehical_type = $request->vehical_type;
            $data->victim = $request->victim;
            $data->crime_type = json_encode($request->crime_type, true);
            $data->paper = json_encode($request->paper, true);
            // $data->paper_number = $request->paper_number;
            $data->unit_id = Auth::user()->unit_id;
            $data->save();
            $id = $data->id;
            return response(json_encode(['success' => 'Your data inserted Success full', 'id' => $id]));
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function registercasedetails_index(Request $request)
    {

        $field = $request->field_name;
        $value = $request->value;
        $date_to = $request->date_to;
        $date_form = $request->date_from;
        $mpdata = Unitauth::where('unit_id', Auth::user()->unit_id)->where('delete_status', 1)->where('status', 1)->get();
        $location = location_model::where('delete_status', 1)->where('unit_id', Auth::user()->unit_id)->get();
        $vehicles = vehicle_model::where('delete_status', 1)->get();
        $crimes = crime_model::where('delete_status', 1)->get();
        $papers = paper_model::where('delete_status', 1)->get();
        if (!empty($field) && !empty($value)) {
            $allcase = casereg_model::where('drop_type', '=', 0)->where('forwared', '=', 0)->where('unit_id', Auth::user()->unit_id)->where('id_mp', Auth::user()->id)
                ->where($field, 'LIKE', '%' . $value . '%')
                ->orderBy('id', 'DESC')->paginate(50);
        } else {
            $allcase = casereg_model::where('drop_type', '=', 0)->where('forwared', '=', 0)->where('unit_id', Auth::user()->unit_id)->where('id_mp', Auth::user()->id)

                ->orderBy('id', 'DESC')->paginate(50);
        }
        if (request()->ajax()) {
            return view('unitauth.mp-admin.casetable', compact('allcase', 'mpdata', 'location', 'vehicles', 'crimes', 'papers'));
        }
        return view('unitauth.mp-admin.register_case_details', compact('allcase', 'mpdata', 'location', 'vehicles', 'crimes', 'papers'));
    }
    public function case_update(Request $request)
    {
        //        return $request;

        $data = [
            'id_mp' => $request->id_mp,
            'case_no' => $request->case_no,
            'victim_name' => $request->victim_name,
            'victim_mb' => $request->victim_mb,
            'vehical_reg' => $request->vehical_reg,
            'date_off' => $request->date_off,
            'time_off' => $request->time_off,
            'date_disposal' => $request->date_disposal,
            'time_disposal' => $request->time_disposal,
            'loc' => $request->loc,
            'vehical_type' => $request->vehical_type,
            'victim' => $request->victim,
            'crime_type' => json_encode($request->crime_type, true),
            'paper' => json_encode($request->paper, true),
            // 'paper_number' => $request->paper_number,
        ];
        casereg_model::findOrFail($request->id)->update($data);
        return response()->json(['success' => 'Update Success']);
    }

    /*=====================userregister_case=======================*/
    public function userregister_case(Request $request)
    {
        $from_sl = $request->from_sl;
        $to_sl = $request->to_sl;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $allcase = casereg_model::where('drop_type', '=', 0)->where('forwared', '=', 0)
            ->where('unit_id', Auth::user()->unit_id)
            ->where(function ($query) use ($from_date, $to_date, $from_sl, $to_sl) {
                $query->whereBetween('case_no', [$from_sl, $to_sl])
                    ->orWhereBetween('date_off', [$from_date, $to_date]);
            })
            ->orderBy('id', 'DESC')
            ->get();
        return view('mp.pages.register_case_details', compact('allcase'));
    }
    /*=====================end userregister_case=======================*/
}
