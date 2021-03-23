<table id="mp-cases" class="table table-striped table-bordered dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th data-priority="2">SL</th>
            <th>Name</th>
            <th>ID No.</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Count Cases</th>
            {{-- <th data-priority="3">Actions</th> --}}
        </tr>
        </thead>
        <tbody>
            @foreach($mp as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->name ?? ''}}</td>
                <td>{{$data->ba_baf_no ?? ''}}</td>
                <td>{{$data->phone ?? ''}}</td>
                <td>{{$data->UnitRole->name ?? ''}}</td>
                <td>{{$data->CaseDetails->count() ?? ''}}</td>
                {{-- <td></td> --}}
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th data-priority="2">SL</th>
                <th>Name</th>
                <th>ID No.</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Count Cases</th>
                {{-- <th data-priority="3">Actions</th> --}}
            </tr>
        </tfoot>
        </table>
        {{-- {{$mp->links()}} --}}
