@extends('layouts.master')

@section('content')
<div class="login-area section-padding">
    <div class="container-fluid px-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="">Old Case List</h3>
                <table id="new-case" class="table table-striped table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Case No.</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Crime</th>
                            <th>Paper Collect</th>
                            <th>Unit</th>
                            <th>Status</th>
                            <th>Release Date</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($case as $id=>$csData)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $csData->case_no ?? ''}}</td>
                                <td>{{ $csData->victim_name ?? ''}}</td>
                                <td>{{ $csData->loc ?? ''}}</td>
                                <td>
                                @if($csData->crime_type!='null' && count( json_decode($csData->crime_type) ) >0 )
                                        @foreach(json_decode($csData->crime_type) as $cdata)
                                            <li>{{$crime->where('id',$cdata)->first()->crime ?? ''}}</li>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                @if(($csData->paper)!='null' && count(json_decode($csData->paper) ) >0)
                                        @foreach(json_decode($csData->paper) as $pdata)
                                            <li>{{$pdata ?? ''}}</li>
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{ $csData->unit->name ?? ''}}</td>
                                <td>
                                        <p class="text-light bg-success rounded-circle p-2">Released</p>
                                </td>
                            <td>{{$csData->ReleaseCase->release_date ?? ''}}</td>
                            </tr>
                            @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sl.</th>
                        <th>Case No.</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Crime</th>
                        <th>Paper Collect</th>
                        <th>Unit</th>
                        <th>Status</th>
                        <th>Release Date</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('#new-case').DataTable();
    });
</script>
@endsection
