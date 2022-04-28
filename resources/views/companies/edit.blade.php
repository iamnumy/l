@extends('layout.admin')
@section('content')
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Employee</h3>
                        </div>
                        <form action="{{route('companies.update', $company->id )}}" method="post" id="upload_form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Name</label>
                                    <input type="text" class="form-control" id="update_name"  name="name" value="{{$company->name}}" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" id="exampleInputEmail1" value="{{$company->email}}" placeholder="Last name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">website</label>
                                    <input type="text" class="form-control" id="website" name="website" id="exampleInputEmail1" value="{{$company->website}}" placeholder="Last name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Logo</label>
                                    <input type="text" class="form-control" id="logo" name="logo" id="exampleInputEmail1" value="{{$company->logo}}" placeholder="email">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="modal-footer justify-content-between">
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
@endsection
