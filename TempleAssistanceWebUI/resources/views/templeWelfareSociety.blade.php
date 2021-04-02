@extends('layout.app')

@section('title','Welfare Society Manage')

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
                    <li>Temple</li>
                    <li><a href="#">{{$response['name']}}</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-md-offset-9 text-right">
                <a class="btn btn-success btn-block" data-toggle="modal" href="#addModel">Add</a>
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
                    <h3 class="card-title">Welfare Society</h3>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Welfare Name</th>
                            <th>Registration Number</th>
                            <th>Member Count</th>
                            <th>President Name</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Samamwatha maranadara samithiya</td>
                            <td>SRN234</td>
                            <td>203</td>
                            <td>Karunananda mahatha</td>
                            <td>
                                <button class="btn btn-success"data-toggle="modal" href="#viewModel"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-warning"data-toggle="modal" href="#updateModel"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger"data-toggle="modal" href="#deleteModel"><i class="fa fa-trash"></i></button>

                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Samamwatha maranadara samithiya</td>
                            <td>SRN234</td>
                            <td>203</td>
                            <td>Karunananda mahatha</td>
                            <td>
                                <button class="btn btn-success"data-toggle="modal" href="#viewModel"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-warning"data-toggle="modal" href="#updateModel"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger"data-toggle="modal" href="#deleteModel"><i class="fa fa-trash"></i></button>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    {{-----------------------------------------------------------------------------------------------------Create Welfare Society--}}
    <div class="modal fade" id="addModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Create Welfare Society</h4>
                </div>
                <form method="POST" action=" ">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">



                                <div class="form-group">
                                    <label class="control-label col-md-5">Welfare Society Name</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="2" type="text" id="welfareSocietyName" name="welfareSocietyName" placeholder="Welfare Society Name"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-5">Registration Number</label>
                                    <div class="col-md-7">
                                        <input class="form-control"  type="text" id="welfareSocietyRegNum"  name="welfareSocietyRegNum" placeholder="Enter Welfare Society Registration Number"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Member Count</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7" type="number" id="memberCount"  name="memberCount" placeholder="Enter Member Count">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">President Name</label>
                                    <div class="col-md-7">
                                        <input class="form-control"  type="text" id="welfarePName"  name="welfarePName" placeholder="Enter President Name"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Secretary Name</label>
                                    <div class="col-md-7">
                                        <input class="form-control"  type="text" id="welfareSName"  name="welfareSName" placeholder="Enter Secretary Name"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Treasure Name</label>
                                    <div class="col-md-7">
                                        <input class="form-control"  type="text" id="welfareTName"  name="welfareTName" placeholder="Enter Treasure Name"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Welfare Society About</u></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5" >Welfare Society Province</label>
                                    <div class="col-md-7">
                                        <select class="form-control" id="welfareSocietyProvince" name="welfareSocietyProvince">
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
                                    <label class="control-label col-md-5" >Welfare Society District</label>
                                    <div class="col-md-7">
                                        <select class="form-control" id="welfareSocietyDistrict" name="welfareSocietyDistrict">
                                            <option value="0">Gampaha</option>
                                            <option value="1">Kandy</option>
                                            <option value="2">Colombo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <label class="control-label col-md-5">Welfare Society Address</label>
                                <div class="col-md-7">
                                    <textarea class="form-control" rows="4" type="text" id="welfareSocietyAddress" name="welfareSocietyAddress" placeholder="Enter Welfare Society Address"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <label class="control-label col-md-5">Welfare Society Phone</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text" id="welfareSocietyPhone" name="welfareSocietyPhone" placeholder="Enter Welfare Society Phone"></input>
                                </div>
                                <label class="control-label col-md-5">This is Primary Phone Number</label>
                                <div class="col-md-7">
                                    <div class="toggle lg">
                                        <label>
                                            <input type="checkbox" id="welfareSocietyPhonePrimary" name="welfareSocietyPhonePrimary"><span class="button-indecator"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <label class="control-label col-md-5">Welfare Society Email</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text" id="welfareSocietyEmail" name="welfareSocietyEmail" placeholder="Enter Welfare Society Email"></input>
                                </div>
                                <label class="control-label col-md-5">This is Primary Email</label>
                                <div class="col-md-7">
                                    <div class="toggle lg">
                                        <label>
                                            <input type="checkbox" id="welfareSocietyEmailPrimary" name="welfareSocietyEmailPrimary"><span class="button-indecator"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>



                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Welfare Society Permission</u></label>
                                </div>
                                <label class="control-label col-md-5">Welfare Society User Name</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text" id="welfareSocietyUN" name="welfareSocietyUN" placeholder="Enter User Name"></input>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <label class="control-label col-md-5">Welfare Society Password</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="password"  id="welfareSocietyPWD" name="welfareSocietyPWD" placeholder="Enter Password"></input>
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


    {{-----------------------------------------------------------------------------------------------------Update Welfare Society--}}
    <div class="modal fade" id="updateModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Update Welfare Society</h4>
                </div>
                <form method="PUT" action=" ">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label col-md-5">Welfare Society Name</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="2" type="text" id="welfareSocietyName" name="welfareSocietyName" placeholder="Welfare Society Name"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-5">Registration Number</label>
                                    <div class="col-md-7">
                                        <input class="form-control"  type="text" id="welfareSocietyRegNum"  name="welfareSocietyRegNum" placeholder="Enter Welfare Society Registration Number"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Member Count</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7" type="number" id="memberCount"  name="memberCount" placeholder="Enter Member Count">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">President Name</label>
                                    <div class="col-md-7">
                                        <input class="form-control"  type="text" id="welfarePName"  name="welfarePName" placeholder="Enter President Name"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Secretary Name</label>
                                    <div class="col-md-7">
                                        <input class="form-control"  type="text" id="welfareSName"  name="welfareSName" placeholder="Enter Secretary Name"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Treasure Name</label>
                                    <div class="col-md-7">
                                        <input class="form-control"  type="text" id="welfareTName"  name="welfareTName" placeholder="Enter Treasure Name"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Welfare Society About</u></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5" >Welfare Society Province</label>
                                    <div class="col-md-7">
                                        <select class="form-control" id="welfareSocietyProvince" name="welfareSocietyProvince">
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
                                    <label class="control-label col-md-5" >Welfare Society District</label>
                                    <div class="col-md-7">
                                        <select class="form-control" id="welfareSocietyDistrict" name="welfareSocietyDistrict">
                                            <option value="0">Gampaha</option>
                                            <option value="1">Kandy</option>
                                            <option value="2">Colombo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <label class="control-label col-md-5">Welfare Society Address</label>
                                <div class="col-md-7">
                                    <textarea class="form-control" rows="4" type="text" id="welfareSocietyAddress" name="welfareSocietyAddress" placeholder="Enter Welfare Society Address"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <label class="control-label col-md-5">Welfare Society Phone</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text" id="welfareSocietyPhone" name="welfareSocietyPhone" placeholder="Enter Welfare Society Phone"></input>
                                </div>
                                <label class="control-label col-md-5">This is Primary Phone Number</label>
                                <div class="col-md-7">
                                    <div class="toggle lg">
                                        <label>
                                            <input type="checkbox" id="welfareSocietyPhonePrimary" name="welfareSocietyPhonePrimary"><span class="button-indecator"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <label class="control-label col-md-5">Welfare Society Email</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text" id="welfareSocietyEmail" name="welfareSocietyEmail" placeholder="Enter Welfare Society Email"></input>
                                </div>
                                <label class="control-label col-md-5">This is Primary Email</label>
                                <div class="col-md-7">
                                    <div class="toggle lg">
                                        <label>
                                            <input type="checkbox" id="welfareSocietyEmailPrimary" name="welfareSocietyEmailPrimary"><span class="button-indecator"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>



                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Welfare Society Permission</u></label>
                                </div>
                                <label class="control-label col-md-5">Welfare Society UserName</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text" id="welfareSocietyUN" name="welfareSocietyUN" placeholder="Enter User Name"></input>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <label class="control-label col-md-5">Welfare Society Password</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="password"  id="welfareSocietyPWD" name="welfareSocietyPWD" placeholder="Enter Password"></input>
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



    {{-----------------------------------------------------------------------------------------------------View Welfare Society--}}
    <div class="modal fade" id="viewModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Welfare Society</h4>
                </div>
                <form method="PUT" action="">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label col-md-4">Welfare Society Name</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="welfareSocietyName" name="welfareSocietyName" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-4">Registration Number</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="welfareSocietyRegNum" name="welfareSocietyRegNum" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Member Count</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="memberCount" name="memberCount" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">President Name</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="welfarePName" name="welfarePName" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Secretary Name</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="welfareSName" name="welfareSName" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Treasure Name</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="welfareTName" name="welfareTName" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Welfare Society About</u></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Province</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="welfareSocietyProvince" name="welfareSocietyProvince" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">District</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="welfareSocietyDistrict" name="welfareSocietyDistrict" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Address</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="welfareSocietyAddress" name="welfareSocietyAddress" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Phone</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="welfareSocietyPhone" name="welfareSocietyPhone" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Email</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="welfareSocietyEmail" name="welfareSocietyEmail" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Welfare Society Permission</u></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">UserName</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="welfareSocietyUN" name="welfareSocietyUN" ></p>
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


    {{-----------------------------------------------------------------------------------------------------Delete Welfare Society Model--}}
    <div class="modal fade" id="deleteModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="login-head"align="center"><i class="fa fa-times-circle" ></i>Are you sure?</h3>

                </div>
                <form method="POST" action=" ">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group">

                                    <div class="col-md-10">
                                        <h5>Do you really want to delete these welfare? This process cannot be undone.</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" data-dismiss="modal" class="btn">Close</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
