<?php

namespace App\Http\Controllers;

use App\casereg_model;
use App\crime_model;
use App\DCB\Accounts;
use App\DCB\DCBDrop;
use App\DCB\ForwadAcceptCase;
use App\DCB\ReleaseCase;
use App\FineConsideration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DcbCaseAPIController extends Controller
{
    public function forward_case_api()
    {
       $forward=ForwadAcceptCase::with([
                    'Unit'=>function($query){$query->select(['id','name']);},
                    'CaseDetails'=>function($query){
                    $query->select(['id','case_no','victim_name','victim_mb','vehical_reg','date_disposal','vehical_type']);
                    }
               ])->where('forward_status',1)->where('accept_status',0)->where('drop_status',0)->where('delete_status',1)->get();
     return   $x= datatables()->of($forward)
            ->addColumn('case_no',function ($data){
                return $data->CaseDetails->case_no;
            })
         ->addColumn('select', function($data){
             $button = '<span class="icheck-success d-inline"><input type="checkbox" id="newcase1'.$data->CaseDetails->id.'" name="chk[]" value="'.$data->CaseDetails->id.'">
                        <label for="newcase1'.$data->CaseDetails->id.'"></label>
                     </span>';
             $button .= '&nbsp;&nbsp;';
             return $button;
         })
            ->addColumn('name',function ($data){
                return $data->CaseDetails->victim_name;
            })
            ->addColumn('mb',function ($data){
                return $data->CaseDetails->victim_mb;
            })
            ->addColumn('reg',function ($data){
                return $data->CaseDetails->vehical_reg;
            })
            ->addColumn('unit',function ($data){
                return $data->Unit->name;
            })
            ->addColumn('date_disposal',function ($data){
                return $data->CaseDetails->date_disposal;
            })
            ->addColumn('vehicle',function ($data){
                return $data->CaseDetails->vehical_type;
            })
            ->addColumn('action',function ($data){
                return '
                 <table>
                    <tr>
                        <td>
                            <button class="btn btn-md btn-info view-data" data-toggle="modal" data-target="#exampleModal" data-id="'.$data->CaseDetails->id.'"
                            >Detail</button>
                        </td>
                        <td>
                            <button class="btn btn-md btn-success edit-data" data-toggle="modal"  data-id="'.$data->CaseDetails->id.'" data-target="#exampleaccept">Accept</button>
                            <button class="btn btn-md btn-danger drop-btn" data-box="'.$data->box_no.'" data-forward_id="'.$data->id.'" data-toggle="modal" data-target="#drop-modal "  data-id="'.$data->CaseDetails->id.'" >Drop</button>
                        </td>
                    </tr>
                </table>
                ';
            })
         ->rawColumns(['case_no','name','mb','reg','unit','date_disposal','vehicle','action','select'])
            ->addIndexColumn()
            ->make(true);

    }
    public function caseDetailsAPi($id){
       $case=casereg_model::with('crimes','unitauth','Unit')->findOrFail($id);

      $x='';
      $total=0;
      foreach (json_decode($case->crime_type) as $crime){
          $crime_details=crime_model::findOrFail($crime);
         $x.= $crime_details->crime.',';
         $total+=$crime_details->fine_crime;
      }
      $relase=ReleaseCase::where('case_id',$case->id ?? '')->first();
      $account=Accounts::where('release_id',$relase->id ?? '')->first();
      $fineCon=FineConsideration::where('case_id',$case->id ?? '')->first();
      if (isset($relase) && isset($account)){

          return array($case,$x,$total,$relase,$account,$fineCon ?? '0');

      }else {

          return array($case,$x,$total,$fineCon ?? '0');

      }
    }
    public function acceptCaseApi(){
        $case=ForwadAcceptCase::with([
            'Unit'=>function($query){$query->select(['id','name']);},
            'CaseDetails'=>function($query){
                $query->select(['id','case_no','victim_name','victim_mb','vehical_reg','date_disposal','vehical_type']);
            }
        ])->where('release_status',0)->where('accept_status',1)->where('forward_status',1)->where('drop_status',0)->where('delete_status',1)->get();
            if(request()->ajax()){
                return  $x= datatables()->of($case)
                    ->addColumn('case_no',function ($data){
                        return $data->CaseDetails->case_no;
                    })
                    ->addColumn('select', function($data){
                        $button = '<span class="icheck-success d-inline"><input type="checkbox" id="newcase1'.$data->CaseDetails->id.'" name="chk[]" value="'.$data->CaseDetails->id.'">
                                <label for="newcase1'.$data->CaseDetails->id.'"></label>
                             </span>';
                        $button .= '&nbsp;&nbsp;';
                        return $button;
                    })
                    ->addColumn('name',function ($data){
                        return $data->CaseDetails->victim_name;
                    })
                    ->addColumn('mb',function ($data){
                        return $data->CaseDetails->victim_mb;
                    })
                    ->addColumn('reg',function ($data){
                        return $data->CaseDetails->vehical_reg;
                    })
                    ->addColumn('unit',function ($data){
                        return $data->Unit->name;
                    })
                    ->addColumn('date_disposal',function ($data){
                        return $data->CaseDetails->date_disposal;
                    })
                    ->addColumn('vehicle',function ($data){
                        return $data->CaseDetails->vehical_type;
                    })
                    ->addColumn('action',function ($data){
                        return '
                         <table>
                            <tr>
                                <td>
                                    <button class="btn btn-md btn-info view-data" data-toggle="modal" data-target="#exampleModal" data-id="'.$data->CaseDetails->id.'"
                                    >Detail</button>
                                </td>
                                <td>
                                    <button class="btn btn-md btn-success edit-data" data-box="'.$data->box_no.'" data-forward_id="'.$data->id.'" data-toggle="modal" data-id="'.$data->CaseDetails->id.'" data-target="#exampleaccept"
                                    >Release</button>
                                    <button class="btn btn-md btn-danger drop-btn" data-box="'.$data->box_no.'" data-forward_id="'.$data->id.'" data-toggle="modal" data-target="#drop-modal "  data-id="'.$data->CaseDetails->id.'" >Drop</button>
                                </td>
                            </tr>
                        </table>
                        ';
                    })
                    ->rawColumns(['case_no','name','mb','reg','unit','date_disposal','vehicle','action','select'])
                    ->addIndexColumn()
                    ->make(true);
        }
    }
    public function caseDrop(Request $request,$id){
//        return $id;
        $forward=ForwadAcceptCase::findOrFail($id);
        $forward->drop_status=1;
        $forward->drop_user=Auth::user()->id;
       if ( $forward->save()==true){
           $drop=new DCBDrop();
           $drop->case_id=$forward->case_id;
           $drop->comment=$request->comment;
           $drop->user=Auth::user()->id;
           $drop->save();
           return response(json_encode(['success' => 'your case drop successfull']));
       }
    }
    public function releaseCaseApi(){
         $release=ReleaseCase::with([
            'Unit'=>function($query){$query->select(['id','name']);},
            'CaseDetails'=>function($query){
                $query->select(['id','case_no','victim_name','victim_mb','vehical_reg','date_disposal','vehical_type']);
            }
        ])->where('delete_status',1)->get();
        if(request()->ajax()){
            return  $x= datatables()->of($release)
                ->addColumn('case_no',function ($data){
                    return $data->CaseDetails->case_no;
                })
                ->addColumn('reg',function ($data){
                    return $data->CaseDetails->vehical_reg;
                })
                ->addColumn('unit',function ($data){
                    return $data->Unit->name;
                })
                ->addColumn('action',function ($data){
                    return '
                         <table>
                            <tr>
                                <td>
                                    <button class="btn btn-md btn-info view-data" data-toggle="modal" data-target="#exampleModal" data-id="'.$data->CaseDetails->id.'"
                                    >Detail</button>
                                </td>
                                <td>
                                    <button class="btn btn-md btn-success edit-data" data-box="'.$data->box_no.'" data-forward_id="'.$data->id.'" data-toggle="modal" data-id="'.$data->CaseDetails->id.'" data-target="#release-edit"
                                    >Edit Release</button>
                                </td>
                            </tr>
                        </table>
                        ';
                })
                ->rawColumns(['case_no','name','mb','reg','unit','date_disposal','vehicle','action','select'])
                ->addIndexColumn()
                ->make(true);
        }
    }
    public function DropCaseData(){
        $forward=ForwadAcceptCase::with([
            'Unit'=>function($query){$query->select(['id','name']);},
            'CaseDetails'=>function($query){
                $query->select(['id','case_no','victim_name','victim_mb','vehical_reg','date_disposal','vehical_type']);
            }
        ,'DropUser'])->where('drop_status',1)->where('delete_status',1)->get();
        return   $x= datatables()->of($forward)
            ->addColumn('case_no',function ($data){
                return $data->CaseDetails->case_no;
            })
            ->addColumn('name',function ($data){
                return $data->CaseDetails->victim_name;
            })
            ->addColumn('mb',function ($data){
                return $data->CaseDetails->victim_mb;
            })
            ->addColumn('reg',function ($data){
                return $data->CaseDetails->vehical_reg;
            })
            ->addColumn('unit',function ($data){
                return $data->Unit->name;
            })
            ->addColumn('date_disposal',function ($data){
                return $data->CaseDetails->date_disposal;
            })
            ->addColumn('user',function ($data){
                return $data->DropUser->name;
            })
            ->addColumn('vehicle',function ($data){
                return $data->CaseDetails->vehical_type;
            })
            ->addColumn('action',function ($data){
                return '
                 <table>
                    <tr>
                        <td>
                            <button class="btn btn-md btn-info view-data" data-toggle="modal" data-target="#exampleModal" data-id="'.$data->CaseDetails->id.'"
                            >Detail</button>
                        </td>
                    </tr>
                </table>
                ';
            })
            ->rawColumns(['case_no','name','mb','reg','unit','date_disposal','vehicle','action','select','user'])
            ->addIndexColumn()
            ->make(true);

    }
    public function InvoiceData(Request $request){
        if ($request->unit!=null && $request->date_to!=null && $request->date_from!=null){
            $invoice=Accounts::with(['Unit'=>function($query){$query->select(['id','name']);},
                'CaseDetails'=>function($query){$query->select(['id','case_no']);},'ReleaseDetails','admin'])->where('delete_status',1)->where('unit_id',$request->unit)->whereBetween('date',[$request->date_to,$request->date_from])->get();

        }else if($request->unit!=null && $request->date_to!=null){

            $invoice=Accounts::with(['Unit'=>function($query){$query->select(['id','name']);},
                'CaseDetails'=>function($query){$query->select(['id','case_no']);},'ReleaseDetails','admin'])->where('delete_status',1)->where('unit_id',$request->unit)->where('date',$request->date_to)->get();

        }else if($request->unit!=null && $request->date_from!=null){
            $invoice=Accounts::with(['Unit'=>function($query){$query->select(['id','name']);},
                'CaseDetails'=>function($query){$query->select(['id','case_no']);},'ReleaseDetails','admin'])->where('delete_status',1)->where('unit_id',$request->unit)->where('date',$request->date_from)->get();

        }else if($request->date_to!=null && $request->date_from!=null){
            $invoice=Accounts::with(['Unit'=>function($query){$query->select(['id','name']);},
                'CaseDetails'=>function($query){$query->select(['id','case_no']);},'ReleaseDetails','admin'])->where('delete_status',1)->whereBetween('date',[$request->date_to,$request->date_from])->get();

        }else if($request->date_to!=null){
            $invoice=Accounts::with(['Unit'=>function($query){$query->select(['id','name']);},
                'CaseDetails'=>function($query){$query->select(['id','case_no']);},'ReleaseDetails','admin'])->where('delete_status',1)->where('date',$request->date_to)->get();
        }else if($request->date_from!=null){
            $invoice=Accounts::with(['Unit'=>function($query){$query->select(['id','name']);},
                'CaseDetails'=>function($query){$query->select(['id','case_no']);},'ReleaseDetails','admin'])->where('delete_status',1)->where('date',$request->date_from)->get();
        }else if($request->unit!=null){
            $invoice=Accounts::with(['Unit'=>function($query){$query->select(['id','name']);},
                'CaseDetails'=>function($query){$query->select(['id','case_no']);},'ReleaseDetails','admin'])->where('delete_status',1)->where('unit_id',$request->unit)->get();
        }else {
            $invoice = Accounts::with(['Unit' => function ($query) {$query->select(['id', 'name']);}, 'CaseDetails' => function ($query) {
                    $query->select(['id', 'case_no']);
                }
                , 'ReleaseDetails', 'admin'])->where('delete_status', 1)->get();
        }
        return  $x= datatables()->of($invoice)
                    ->addColumn('case_no',function ($data){
                        return $data->ReleaseDetails->case_no;
                    })
                    ->addColumn('unit',function ($data){
                        return $data->Unit->name;
                    })
                    ->addColumn('user',function ($data){
                        return $data->admin->name;
                    })
                    ->addColumn('action',function ($data){
                        return '
                                <table>
                                    <tr>
                                        <td>
                                            <button class="btn btn-md btn-info view-data" data-toggle="modal" data-target="#view" data-id="'.$data->ReleaseDetails->case_id.'">Detail</button>
                                        </td>
                                        <td>
                                           <a href="'.route('superadmin.print.invoice',$data->ReleaseDetails->case_id).'" class="btn btn-md btn-danger " data-id="'.$data->id.'" target="_blank"><i class="fa fa-print"></i>Print</a>
                                        </td>
                                    </tr>
                                </table>
                                '; })
                ->rawColumns(['case_no','unit','user','action'])
                ->addIndexColumn()
                ->make(true);
    }

}
