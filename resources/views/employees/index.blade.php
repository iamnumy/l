@extends('layout.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Employees</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="portlet box portlet-yellow">
                            </div>
                        </div>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
                            Add Employee
                        </button>
                        <div class="modal fade" id="modal-xl">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Add New Employee</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <form action="{{route('employees.store')}}" method="post" >
                                                @csrf
                                                @method('POST')
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">First name</label>
                                                        <input type="text" class="form-control" id="first_name"  name="first_name" value="" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Last Name</label>
                                                        <input type="text" class="form-control" name="last_name" id="exampleInputEmail1" value="" placeholder="Last name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email</label>
                                                        <input type="text" class="form-control" name="email" id="exampleInputEmail1" value="" placeholder="email">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Phone</label>
                                                        <input type="number" class="form-control" name="phone" id="exampleInputEmail1" value="" placeholder="Number">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Company</label>
                                                        <select name="company_id" id="company_id">
                                                            @foreach($companies as $company)
                                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->

                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" >Save changes</button>
                                                </div>
                                            </form>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>First Name </th>
                                    <th>Last Name</th>
                                    <th>Company Id</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->first_name }}</td>
                                        <td>{{ $employee->last_name }}</td>
                                        <td>{{ ($employee->company)?$employee->company->name:"" }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone}}</td>
                                        <td> <a type="button" class="btn btn-default" href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-danger" value="Delete"/>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
@push('custom-js')
    <script>
        $("#example").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        {{--function loadModel(data){--}}
        {{--    var url = " {{ route('employees.update',':id') }}";--}}
        {{--    url = url.replace(":id",data.id);--}}
        {{--    $("#upload_form").attr('action',url);--}}
        {{--    $("#update_first_name").val(data.first_name);--}}
        {{--    $("#update_last_name").val(data.last_name);--}}
        {{--    $("#update_email").val(data.email);--}}
        {{--    $("#update_phone").val(data.phone);--}}
        {{--    $("#update_company_id option[value="+data.company_id+"]").attr('selected','selected');--}}
        {{--}--}}
    </script>
@endpush
