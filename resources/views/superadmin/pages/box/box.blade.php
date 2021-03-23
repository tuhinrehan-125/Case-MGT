@extends('superadmin.layout.app')
@section('title', 'Dashboard')


@section('css')

<style>
    @media only screen and (min-device-width: 360px) and (max-device-width: 640px) {
        .box-table {
            width: 200px;
        }
    }
</style>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-red"><i class="fas fa-address-book mr-1"></i> Box</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Box</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-lg-12 col-12">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <!-- <i class="fas fa-map-marker mr-1"></i> -->
                                <b class="btn btn-success" data-toggle="modal" data-target="#addbox">Add Box</b>
                            </h3>
                        </div>
                    </div>
                    <!-- ADD Modal -->
                    <div class="modal fade" id="addbox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add new box</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{route('superadmin.boxstore')}}">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Box Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" class="form-control" id="name" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="box_number" class="col-sm-2 col-form-label">Box Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="number" class="form-control" id="box_number" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="qty" class="col-sm-2 col-form-label">Quantity</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="qty" class="form-control" id="qty">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <button class="btn btn-success">Confirm</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12 col-12">
                        <div class="card card-success card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <!-- <i class="fas fa-map-marker mr-1"></i> -->
                                    <b>Box</b>
                                </h3>
                            </div>
                            <div class="card-body table-responsive">

                                <table class=" table table-bordered table-striped example1 box-table">
                                    <thead>
                                        <tr>
                                            <th>Sl./No</th>
                                            <th>Box Name</th>
                                            <th>Box Number</th>
                                            <th>Quantity</th>
                                            <th>Old Case</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($box as $data)
                                        @php
                                        $total=App\DCB\ForwadAcceptCase::where('box_no',$data->number)->where('forward_status',1)->where('drop_status',0)->where('accept_status',1)->where('delete_status',1)->get();
                                        @endphp
                                        <tr>
                                            <th>{{$loop->iteration}}</th>
                                            <th>{{$data->name ?? ''}}</th>
                                            <th>{{$data->number ?? ''}}</th>
                                            <th>{{$data->qty ?? ''}}</th>
                                            <th>{{ count($total)?? ''}}</th>
                                            <th>
                                                <a href="#" class="btn btn-info edit-btn " data-id="{{$data->id ?? ''}}" data-name="{{$data->name ?? ''}}" data-number="{{$data->number ?? ''}}" data-qty="{{$data->qty ?? ''}}" data-toggle="modal" data-target="#edit">Edit</a>
                                            </th>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Sl./No</th>
                                            <th>Box Name</th>
                                            <th>Box Number</th>
                                            <th>Quantity</th>
                                            <th>Old Case</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- edit Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update box</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('superadmin.boxupdate')}}">
                    @csrf
                    <input type="hidden" name="id" value="" class="id">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Box Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name " class="form-control name" id="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="box_number" class="col-sm-2 col-form-label">Box Number</label>
                        <div class="col-sm-10">
                            <input type="text" name="number" class="form-control box_number " id="box_number" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="qty" class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                            <input type="text" name="qty" class="form-control qty" id="qty">
                        </div>
                    </div>
                    <div class="form-group row">
                        <button class="btn btn-success">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script>
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var name = $(this).data('name');
        var number = $(this).data('number');
        var qty = $(this).data('qty');
        $('.box_number').val(number)
        $('.id').val(id)
        $('.name').val(name)
        $('.qty').val(qty)
    })
</script>
@endsection