                            <table id="accept-table" class="table table-sm table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Vehicle Reg.No</th>
                                    <th>Total Case</th>
                                    {{-- <th >Action</th> --}}
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($case as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$data->name ??''}}</td>
                                            <td>{{$data->phone ??''}}</td>
                                            <td>{{$data->vehicle_number ??''}}</td>
                                            <td>{{$data->Case->count() ??''}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>

                                    <tr>
                                        <th>Sl.</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Vehicle Reg.No</th>
                                        <th>Total Case</th>
                                        {{-- <th >Action</th> --}}
                                    </tr>
                                </tfoot>
                            </table>
                            {{-- {{$accept->links()}} --}}
