@extends('layout.appAdmin')

@section('title','Dhamma School Manage')

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
            <div class="col-md-12 text-right">
                <br/>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-title">Dhamma School List</h3>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Dhamma School Name</th>
                            <th>Temple Name</th>
                            <th>Registered Number</th>
                            <th>Principle Name</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Rathanapala Dhamma School</td>
                            <td>Bimbarama Viharasthanya</td>
                            <td>DP123</td>
                            <td>Rathanapala Thero</td>
                            <td>
                                <button class="btn btn-success"data-toggle="modal" href="#viewModel"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-warning"data-toggle="modal" href="#updateModel"><i class="fa fa-edit"></i></button>

                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Sadaham Dhamma School</td>
                            <td>Sunethrama Viharasthanya</td>
                            <td>DP123</td>
                            <td>Rathanapala Thero</td>
                            <td>
                                <button class="btn btn-success"data-toggle="modal" href="#viewModel"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-warning"data-toggle="modal" href="#updateModel"><i class="fa fa-edit"></i></button>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-----------------------------------------------------------------------------------------------------Update Dhamma School--}}
    <div class="modal fade" id="updateModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Update Dhamma School</h4>
                </div>
                <form method="POST" action=" ">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">



                                <div class="form-group">
                                    <label class="control-label col-md-5">Dhamma School Name</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="2" type="text" id="dhammaSchName" name="dhammaSchName" placeholder="Dhamma School Name"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-5">Registration Number</label>
                                    <div class="col-md-7">
                                        <input class="form-control"  type="text" id="dhammaSchRegNum"  name="dhammaSchRegNum" placeholder="Enter Dhamma School Registration Number"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Student Count</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7" type="number" id="stdCount"  name="stdCount" placeholder="Enter Student Count">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Principle Name</label>
                                    <div class="col-md-7">
                                        <input class="form-control"  type="text" id="dhammaSchPName"  name="dhammaSchPName" placeholder="Enter Principle Name"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Dhamma School About</u></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5" >Dhamma School Province</label>
                                    <div class="col-md-7">
                                        <select class="form-control" id="dhammaSchProvince" name="dhammaSchProvince">
                                            <option value="0">Western</option>
                                            <option value="1">Central</option>
                                            <option value="2">Eastern</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5" >Dhamma School District</label>
                                    <div class="col-md-7">
                                        <select class="form-control" id="dhammaSchDistrict" name="dhammaSchDistrict">
                                            <option value="0">Gampaha</option>
                                            <option value="1">Kandy</option>
                                            <option value="2">Colombo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <label class="control-label col-md-5">Dhamma School Address</label>
                                <div class="col-md-7">
                                    <textarea class="form-control" rows="4" type="text" id="dhammaSchAddress" name="dhammaSchAddress" placeholder="Enter Dhamma School Address"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <label class="control-label col-md-5">Dhamma School Phone</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text" id="dhammaSchPhone" name="dhammaSchPhone" placeholder="Enter Dhamma School Phone"></input>
                                </div>
                                <label class="control-label col-md-5">This is Primary Phone Number</label>
                                <div class="col-md-7">
                                    <div class="toggle lg">
                                        <label>
                                            <input type="checkbox" id="dhammaSchPhonePrimary" name="dhammaSchPhonePrimary"><span class="button-indecator"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <label class="control-label col-md-5">Dhamma School Email</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text" id="dhammaSchEmail" name="dhammaSchEmail" placeholder="Enter Dhamma School Email"></input>
                                </div>
                                <label class="control-label col-md-5">This is Primary Emailr</label>
                                <div class="col-md-7">
                                    <div class="toggle lg">
                                        <label>
                                            <input type="checkbox" id="dhammaSchEmailPrimary" name="dhammaSchEmailPrimary"><span class="button-indecator"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>



                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Dhamma School Permission</u></label>
                                </div>
                                <label class="control-label col-md-5">Dhamma School User Name</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text" id="dhammaSchUN" name="dhammaSchUN" placeholder="Enter User Name"></input>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <label class="control-label col-md-5">Dhamma School Password</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="password"  id="dhammaSchPWD" name="dhammaSchPWD" placeholder="Enter Password"></input>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" data-dismiss="modal" class="btn">Close</a>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-----------------------------------------------------------------------------------------------------View Dhamma School--}}
    <div class="modal fade" id="viewModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Dhamma School</h4>
                </div>
                <form method="PUT" action="">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label col-md-4">Dhamma School Name</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="dhammaSchName" name="dhammaSchName" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-4">Registration Number</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="dhammaSchRegNum" name="dhammaSchRegNum" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Student Count</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="stdCount" name="stdCount" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Principle Name</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="dhammaSchPName" name="dhammaSchPName" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Dhamma School About</u></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Province</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="dhammaSchProvince" name="dhammaSchProvince" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">District</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="dhammaSchDistrict" name="dhammaSchDistrict" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Address</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="dhammaSchAddress" name="dhammaSchAddress" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Phone</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="dhammaSchPhone" name="dhammaSchPhone" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Email</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="dhammaSchEmail" name="dhammaSchEmail" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Dhamma School Permission</u></label>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-4">UserName</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="dhammaSchUN" name="dhammaSchUN" ></p>
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
@endsection
