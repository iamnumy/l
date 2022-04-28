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
                            <h3 class="card-title">Companies</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="portlet box portlet-yellow">
                            </div>
                        </div>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
                        Add Company
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
                                            <h3 class="card-title">Add New Company</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form action="{{route('companies.store')}}" method="post" id="upload_form" enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Name</label>
                                                    <input type="text" class="form-control" id="name"  name="name" value="" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" name="email" value="" placeholder="Enter email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">website</label>
                                                    <input type="text" class="form-control" name="website" value="" placeholder="Website">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Logo</label>
                                                    <div class="form-group mb-3">
                                                        <input type="file" name="logo" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" >Save changes</button>
                                            </div>
                                        </form>
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
                                    <th>Name </th>
                                    <th>Email</th>
                                    <th>website</th>
                                    <th>Logo</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $company)
                                    <tr>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td>{{ $company->website  }}</td>
                                        <td>
                                            <img src="{{ asset('storage/app/public/'.$company->logo) }}" width="100px" height="100px" alt="Image">
                                        </td>
                                        <td>
                                               <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-danger" value="Delete"/>
                                                </form>
                                            <a type="button" class="btn btn-default" href="{{ route('companies.edit', $company->id) }}">
                                                Edit
                                            </a>
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
        {{--    var url = " {{ route('companies.update',':id') }}";--}}
        {{--    url = url.replace(":id",data.id);--}}
        {{--    $("#upload_form").attr('action',url);--}}
        {{--    $("#update_name").val(data.name);--}}
        {{--    $("#update_email").val(data.email);--}}
        {{--    $("#update_website").val(data.website);--}}
        {{--    $("#update_logo").val(data.logo);--}}
        {{--    $("#update_company_id option[value="+data.company_id+"]").attr('selected','selected');--}}
        {{--}--}}
    </script>
@endpush
