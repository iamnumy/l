@extends('layout.admin')
@section('content')
                                <div class="modal-content">
                                    <form action="{{route('employees.update', $employee->id)}}" method="post" id="upload_form" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">First name</label>
                                                <input type="text" class="form-control" id="update_first_name"  name="first_name" value="{{$employee->first_name}}" placeholder="Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Last Name</label>
                                                <input type="text" class="form-control" id="update_last_name" name="last_name" id="exampleInputEmail1" value="{{$employee->last_name}}" placeholder="Last name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="text" class="form-control" id="update_email" name="email" id="exampleInputEmail1" value="{{$employee->email}}" placeholder="email">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Phone</label>
                                                <input type="number" class="form-control" name="phone" id="update_phone" id="exampleInputEmail1" value="{{$employee->phone}}" placeholder="Number">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Company</label>
                                                <select name="company_id" id="update_company_id">
                                                    @foreach($companies as $company)
                                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="modal-footer justify-content-between">
                                            <button type="submit" class="btn btn-primary" >Save changes</button>
                                        </div>
                                    </form>
                                </div>
@endsection
