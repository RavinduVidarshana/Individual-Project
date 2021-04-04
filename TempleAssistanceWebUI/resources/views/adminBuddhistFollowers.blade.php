@extends('layout.appAdmin')

@section('title','Temple Manage')

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
                    <h3 class="card-title">Buddhist Followers List</h3>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Telephone</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Prakash</td>
                            <td>Vidarshana</td>
                            <td>0779908185</td>
                            <td>
                                <div class="col-md-7">
                                    <div class="toggle lg">
                                        <label>
                                            <input type="checkbox" id="bfApproved" name="bfApproved"><span class="button-indecator"></span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-success"data-toggle="modal" href="#viewModel"><i class="fa fa-eye"></i></button>
{{--                                <button class="btn btn-warning"data-toggle="modal" href="#updateModel"><i class="fa fa-edit"></i></button>--}}

                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Ravindu</td>
                            <td>Prakash</td>
                            <td>0759669585</td>
                            <td>
                                <div class="col-md-7">
                                    <div class="toggle lg">
                                        <label>
                                            <input type="checkbox" id="bfApproved" name="bfApproved"><span class="button-indecator"></span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-success"data-toggle="modal" href="#viewModel"><i class="fa fa-eye"></i></button>
{{--                                <button class="btn btn-warning"data-toggle="modal" href="#updateModel"><i class="fa fa-edit"></i></button>--}}

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


{{--    --}}{{-----------------------------------------------------------------------------------------------------UPdate BF--}}
{{--    <div class="modal fade" id="updateModel" data-backdrop="static" data-keyboard="false" tabindex="-1"--}}
{{--         aria-labelledby="daneModelLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
{{--                    <h4 class="modal-title" id="daneModelLabel" align="center">Update Buddhist Followers</h4>--}}
{{--                </div>--}}
{{--                <form method="POST" action=" ">--}}
{{--                    @csrf--}}
{{--                    <div class="model-body">--}}
{{--                        <div class="row" >--}}
{{--                            <div class="col-md-12">--}}


{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-5">First Name</label>--}}
{{--                                    <div class="col-md-7">--}}
{{--                                        <input class="form-control"  type="text" id="bfFName" name="bfFName" placeholder="Enter First Name"></input>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-5">Last Name</label>--}}
{{--                                    <div class="col-md-7">--}}
{{--                                        <input class="form-control"  type="text" id="bfLName" name="bfLName" placeholder="Enter Last Name"></input>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-5">NIC Number</label>--}}
{{--                                    <div class="col-md-7">--}}
{{--                                        <input class="form-control"  type="text" id="bfNIC" name="bfNIC" placeholder="Enter NIC Number"></input>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}



{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" for="inputSmall"><u>Buddhist Followers About</u></label>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-5" >Select Buddhist Followers Province</label>--}}
{{--                                    <div class="col-md-7">--}}
{{--                                        <select class="form-control" id="bfProvince" name="bfProvince">--}}
{{--                                            <option value="0">Western</option>--}}
{{--                                            <option value="1">Central</option>--}}
{{--                                            <option value="2">Eastern</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-5" >Select Buddhist Followers District</label>--}}
{{--                                    <div class="col-md-7">--}}
{{--                                        <select class="form-control" id="bfDistrict" name="bfDistrict">--}}
{{--                                            <option value="0">Gampaha</option>--}}
{{--                                            <option value="1">Kandy</option>--}}
{{--                                            <option value="2">Colombo</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}

{{--                                <label class="control-label col-md-5">Buddhist Followers Address</label>--}}
{{--                                <div class="col-md-7">--}}
{{--                                    <textarea class="form-control" rows="4" type="text" id="bfAddress" name="bfAddress" placeholder="Enter Buddhist Followers Address"></textarea>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}

{{--                                <label class="control-label col-md-5">Buddhist Followers Phone</label>--}}
{{--                                <div class="col-md-7">--}}
{{--                                    <input class="form-control col-md-7" type="text" id="bfPhone" name="bfPhone" placeholder="Enter Buddhist Followers Phone"></input>--}}
{{--                                </div>--}}
{{--                                <label class="control-label col-md-5">This is Primary Phone Number</label>--}}
{{--                                <div class="col-md-7">--}}
{{--                                    <div class="toggle lg">--}}
{{--                                        <label>--}}
{{--                                            <input type="checkbox" id="bfPhonePrimary" name="bfPhonePrimary"><span class="button-indecator"></span>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}

{{--                                <label class="control-label col-md-5">Buddhist Followers Email</label>--}}
{{--                                <div class="col-md-7">--}}
{{--                                    <input class="form-control col-md-7" type="text" id="bfEmail" name="bfEmail" placeholder="Enter Buddhist Followers Email"></input>--}}
{{--                                </div>--}}
{{--                                <label class="control-label col-md-5">This is Primary Emailr</label>--}}
{{--                                <div class="col-md-7">--}}
{{--                                    <div class="toggle lg">--}}
{{--                                        <label>--}}
{{--                                            <input type="checkbox" id="bfEmailPrimary" name="bfEmailPrimary"><span class="button-indecator"></span>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}



{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" for="inputSmall"><u>Buddhist Followers Location</u></label>--}}
{{--                                </div>--}}
{{--                                <label class="control-label col-md-5">Buddhist Followers Longitude</label>--}}
{{--                                <div class="col-md-7">--}}
{{--                                    <input class="form-control col-md-7" type="text" id="bfLongitude" name="bfLongitude" placeholder="Enter Buddhist Followers Longitude"></input>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}
{{--                                <label class="control-label col-md-5">Buddhist Followers Latitude</label>--}}
{{--                                <div class="col-md-7">--}}
{{--                                    <input class="form-control col-md-7" type="text"  id="bfLatitude" name="bfLatitude" placeholder="Enter Buddhist Followers Latitude"></input>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}


{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" for="inputSmall"><u>Buddhist Followers Permission</u></label>--}}
{{--                                </div>--}}
{{--                                <label class="control-label col-md-5">Buddhist Followers User Name</label>--}}
{{--                                <div class="col-md-7">--}}
{{--                                    <input class="form-control col-md-7" type="text" id="bfUN" name="bfUN" placeholder="Enter User Name"></input>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}
{{--                                <label class="control-label col-md-5">Buddhist Followers Password</label>--}}
{{--                                <div class="col-md-7">--}}
{{--                                    <input class="form-control col-md-7" type="password"  id="bfPWD" name="bfPWD" placeholder="Enter Password"></input>--}}
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


    {{-----------------------------------------------------------------------------------------------------View BF--}}
    <div class="modal fade" id="viewModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Temple</h4>
                </div>
                <form method="PUT" action="">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label col-md-4">First Name</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="bfFName" name="bfFName" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-4">Last Name</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="bfLName" name="bfLName" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">NIC Number</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="bfNIC" name="bfNIC" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>



                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Buddhist Followers About</u></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Province</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="bfProvince" name="bfProvince" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">District</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="bfDistrict" name="bfDistrict" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Address</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="bfAddress" name="bfAddress" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Phone</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="bfPhone" name="bfPhone" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Email</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="bfEmail" name="bfEmail" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Buddhist Followers Location</u></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Longitude</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="bfLongitude" name="bfLongitude" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Latitude</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="bfLatitude" name="bfLatitude" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Buddhist Followers Permission</u></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">UserName</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="bfUN" name="bfUN" ></p>
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
