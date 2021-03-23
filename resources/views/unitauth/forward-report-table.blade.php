<table id="forward-case" class="table table-striped table-bordered dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th data-priority="2">SL</th>
            <th>Date</th>
            <th>Count Cases</th>
            {{-- <th>Forwarded Admin</th> --}}
            <th data-priority="3">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($forward as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->forward_date ?? ''}}</td>
                <td>{{$caseCount->where('forward_date',$data->forward_date)->count() ?? ''}}</td>
                {{-- <td>{{$data->admin->name ?? ''}}</td> --}}
            <td><a href="{{route('unitauth.forwad.report.date',$data->forward_date ?? '')}}" class="btn btn-danger"><i class="fa fa-print"></i></a></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th data-priority="2">SL</th>
                <th>Date</th>
                <th>Count Cases</th>
                {{-- <th>Forwarded Admin</th> --}}
                <th data-priority="3">Actions</th>
            </tr>
        </tfoot>
        </table>
        {{$forward->links()}}
