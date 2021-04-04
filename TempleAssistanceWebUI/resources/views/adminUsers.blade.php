@extends('layout.appAdmin')

@section('title','Users Manage')

@section('body-content')

    <div class="content-wrapper">
        <div class="page-title">
            <div>
                <h1><i class="fa fa-archive"></i> {{$response['name']}}</h1>
                {{--                <p>Widgets to interactively display data</p>--}}
            </div>
            <div>
                <ul class="breadcrumb">
                    <li><i class="fa fa-home fa-lg"></i></li>
                    <li>Admin</li>
                    <li><a href="#">{{$response['name']}}</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-md-offset-9 text-right">
                <a class="btn btn-success btn-block" data-toggle="modal" href="#addModel">Add New User</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-right">
                <br/>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-title">Users List</h3>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>User Role</th>
                            <th>User Name</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Prakash Ravindu</td>
                            <td>Admin</td>
                            <td>Prakash</td>
                            <td>
                                <button class="btn btn-success"data-toggle="modal" href="#viewModel"><i class="fa fa-eye"></i></button>
{{--                                <button class="btn btn-warning"data-toggle="modal" href="#updateModel"><i class="fa fa-edit"></i></button>--}}
{{--                                <button class="btn btn-danger"data-toggle="modal" href="#deleteModel"><i class="fa fa-trash"></i></button>--}}

                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>RatahanaPala Thero</td>
                            <td>Dhamma School Principle</td>
                            <td>RathanaPala</td>
                            <td>
                                <button class="btn btn-success"data-toggle="modal" href="#viewModel"><i class="fa fa-eye"></i></button>
{{--                                <button class="btn btn-warning"data-toggle="modal" href="#updateModel"><i class="fa fa-edit"></i></button>--}}
{{--                                <button class="btn btn-danger"data-toggle="modal" href="#deleteModel"><i class="fa fa-trash"></i></button>--}}

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    {{-----------------------------------------------------------------------------------------------------Add user--}}
    <div class="modal fade" id="addModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Create User</h4>
                </div>
                <form method="POST" action=" ">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">



                                <div class="form-group">
                                    <label class="control-label col-md-5">Full Name</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="2" type="text" id="fullName" name="fullName" placeholder="Enter User Full Name"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>


{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-5" >Select User Role</label>--}}
{{--                                    <div class="col-md-7">--}}
{{--                                        <select class="form-control" id="userRole" name="userRole">--}}
{{--                                            <option value="0">Admin</option>--}}
{{--                                            <option value="1">Temple Main Monk</option>--}}
{{--                                            <option value="2">Welfare Society President</option>--}}
{{--                                            <option value="3">Dhamma School Principle</option>--}}
{{--                                            <option value="4">Buddhist Followers</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>


                                <label class="control-label col-md-5">User Name</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text" id="userName" name="userName" placeholder="Enter User Name"></input>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <label class="control-label col-md-5">Password</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="password"  id="password" name="password" placeholder="Enter Password"></input>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" data-dismiss="modal" class="btn">Close</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


{{--    --}}{{-----------------------------------------------------------------------------------------------------Update user--}}
{{--    <div class="modal fade" id="updateModel" data-backdrop="static" data-keyboard="false" tabindex="-1"--}}
{{--         aria-labelledby="daneModelLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
{{--                    <h4 class="modal-title" id="daneModelLabel" align="center">Update User</h4>--}}
{{--                </div>--}}
{{--                <form method="POST" action=" ">--}}
{{--                    @csrf--}}
{{--                    <div class="model-body">--}}
{{--                        <div class="row" >--}}
{{--                            <div class="col-md-12">--}}



{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-5">Full Name</label>--}}
{{--                                    <div class="col-md-7">--}}
{{--                                        <textarea class="form-control" rows="2" type="text" id="fullName" name="fullName" placeholder="Enter User Full Name"></textarea>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}


{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-5" >Select User Role</label>--}}
{{--                                    <div class="col-md-7">--}}
{{--                                        <select class="form-control" id="userRole" name="userRole">--}}
{{--                                            <option value="0">Admin</option>--}}
{{--                                            <option value="1">Temple Main Monk</option>--}}
{{--                                            <option value="2">Welfare Society President</option>--}}
{{--                                            <option value="3">Dhamma School Principle</option>--}}
{{--                                            <option value="4">Buddhist Followers</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}


{{--                                <label class="control-label col-md-5">User Name</label>--}}
{{--                                <div class="col-md-7">--}}
{{--                                    <input class="form-control col-md-7" type="text" id="userName" name="userName" placeholder="Enter User Name"></input>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}

{{--                                <label class="control-label col-md-5">Password</label>--}}
{{--                                <div class="col-md-7">--}}
{{--                                    <input class="form-control col-md-7" type="password"  id="password" name="password" placeholder="Enter Password"></input>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="modal-footer">--}}
{{--                            <a href="#" data-dismiss="modal" class="btn">Close</a>--}}
{{--                            <button type="submit" class="btn btn-primary">Save Changes</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    {{-----------------------------------------------------------------------------------------------------View User School--}}
    <div class="modal fade" id="viewModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">User</h4>
                </div>
                <form method="PUT" action="">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">


                                <div class="form-group">
                                    <label class="control-label col-md-4">Full Name</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="fullName" name="fullName" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">User Role</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="userRole" name="userRole" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">User Name</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="userName" name="userName" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" data-dismiss="modal" class="btn">Close</a>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
{{--    --}}{{-----------------------------------------------------------------------------------------------------Delete Users Model--}}
{{--    <div class="modal fade" id="deleteModel" data-backdrop="static" data-keyboard="false" tabindex="-1"--}}
{{--         aria-labelledby="daneModelLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
{{--                    <h3 class="login-head"align="center"><i class="fa fa-times-circle" ></i>Are you sure?</h3>--}}

{{--                </div>--}}
{{--                <form method="POST" action=" ">--}}
{{--                    @csrf--}}
{{--                    <div class="model-body">--}}
{{--                        <div class="row" >--}}
{{--                            <div class="col-md-12">--}}
{{--                                <div class="form-group">--}}

{{--                                    <div class="col-md-10">--}}
{{--                                        <h5>Do you really want to delete these user? This process cannot be undone.</h5>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="modal-footer">--}}
{{--                            <a href="#" data-dismiss="modal" class="btn">Close</a>--}}
{{--                            <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
