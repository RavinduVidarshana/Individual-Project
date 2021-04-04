@extends('layout.appWelfareSociety')

@section('title','Welfare Society Profile')

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
                    <li>Welfare Society</li>
                    <li><a href="#">{{$response['name']}}</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-3 text-center" style="background-color: #404040;min-height: 200px">
                                <br/>
                                <img class="user-img img-circle" height="100px" src="images/user.png">
                                <br/>
                                <h4 class="text-center text-primary">Welfare Name</h4>
                                <h6 class="text-center text-primary">President Name</h6>
                            </div>
                            <div class="col-md-9" style="background-image: url(images/regImage.jpg);min-height: 200px">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <br/>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="PUT" action="#">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Welfare Society Name</label>
                                        <textarea class="form-control" rows="2" type="text" id="welfareSocietyName" name="welfareSocietyName" placeholder="Welfare Society Name"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Registration Number</label>
                                        <input class="form-control"  type="text" id="welfareSocietyRegNum"  name="welfareSocietyRegNum" placeholder="Enter Welfare Society Registration Number"></input>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Member Count</label>
                                        <input class="form-control col-md-7" type="number" id="memberCount"  name="memberCount" placeholder="Enter Member Count">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">President Name</label>
                                        <input class="form-control"  type="text" id="welfarePName"  name="welfarePName" placeholder="Enter President Name"></input>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Secretary Name</label>
                                        <input class="form-control"  type="text" id="welfareSName"  name="welfareSName" placeholder="Enter Secretary Name"></input>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Treasure Name</label>
                                        <input class="form-control"  type="text" id="welfareTName"  name="welfareTName" placeholder="Enter Treasure Name"></input>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <hr class="mt-3 mb-3">
                                        <label class="control-label">Welfare Society Permission</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Welfare UserName</label>
                                        <input class="form-control col-md-7" type="text" id="templeUN" name="templeUN" placeholder="Enter User Name"></input>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Welfare Password</label>
                                        <input class="form-control col-md-7" type="password"  id="templePWD" name="templePWD" placeholder="Enter Password"></input>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-12" ></label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 col-md-offset-9">
                                    <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{--//************************************************************************************** Address--}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title pull-left">Address</h4>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary pull-right" data-toggle="modal" href="#addAModel">Add New</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">

                                    <tbody>
                                    <tr>
                                        <td  width="80%"> B13, Kadawatha Sri Rathanapala dahamma schhol  <span class="text-success">(Default)</span></td>
                                        <td width="20%">
                                            <button class="btn btn-warning"data-toggle="modal" href="#updateAModel"><i class="fa fa-edit"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="80%"> Sri Sri Rathanapala dahamma schhol, Ragama Road, Kadawatha </td>
                                        <td width="20%">
                                            <button class="btn btn-warning"data-toggle="modal" href="#updateAModel"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-danger" data-toggle="modal" href="#deleteModel"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{--//**************************************************************************************Phone Numbers--}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title pull-left">Phone Numbers</h4>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary pull-right" data-toggle="modal" href="#addPModel">Add New</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">

                                    <tbody>
                                    <tr>
                                        <td  width="80%">011 036 8096 <span class="text-success">(Default)</span></td>
                                        <td width="20%">
                                            <button class="btn btn-warning"data-toggle="modal" href="#updatePModel"><i class="fa fa-edit"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="80%">077 125 4852 </td>
                                        <td width="20%">
                                            <button class="btn btn-warning"data-toggle="modal" href="#updatePModel"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-danger" data-toggle="modal" href="#deleteModel"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>



        {{--        //**************************************************************************************Email--}}


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title pull-left"> Emails</h4>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary pull-right" data-toggle="modal" href="#addEModel">Add New</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">

                                    <tbody>
                                    <tr>
                                        <td  width="80%">rathanapalaschhol134@gmail.com <span class="text-success">(Default)</span></td>
                                        <td width="20%">
                                            <button class="btn btn-warning"data-toggle="modal" href="#updateEModel"><i class="fa fa-edit"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="80%">dammasch4@gmail.com </td>
                                        <td width="20%">
                                            <button class="btn btn-warning"data-toggle="modal" href="#updateEModel"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-danger" data-toggle="modal" href="#deleteModel"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    =====================================  Address  ====================================================================================================================Form--}}
    {{-------------------------------------------------------------------------------------------------------Create Phone--}}
    <div class="modal fade" id="addAModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Add New Address</h4>
                </div>
                <form method="POST" action=" ">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label col-md-5" >Select Temple Province</label>
                                    <div class="col-md-7">
                                        <select class="form-control" id="templeProvince" name="templeProvince">
                                            <option value="0">Western</option>
                                            <option value="1">Central</option>
                                            <option value="2">Eastern</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5" >Select Temple District</label>
                                    <div class="col-md-7">
                                        <select class="form-control" id="templeDistrict" name="templeDistrict">
                                            <option value="0">Gampaha</option>
                                            <option value="1">Kandy</option>
                                            <option value="2">Colombo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Temple Address</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="4" type="text" id="templeAddress" name="templeAddress" placeholder="Enter Temple Address"></textarea>
                                    </div>
                                    <label class="control-label col-md-5">This is Primary Phone Number</label>
                                    <div class="col-md-7">
                                        <div class="toggle lg">
                                            <label>
                                                <input type="checkbox" id="templePhonePrimary" name="templePhonePrimary"><span class="button-indecator"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" data-dismiss="modal" class="btn">Close</a>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-------------------------------------------------------------------------------------------------------Update Phone--}}
    <div class="modal fade" id="updateAModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Update Address</h4>
                </div>
                <form method="POST" action=" ">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label col-md-5" >Select Temple Province</label>
                                    <div class="col-md-7">
                                        <select class="form-control" id="templeProvince" name="templeProvince">
                                            <option value="0">Western</option>
                                            <option value="1">Central</option>
                                            <option value="2">Eastern</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5" >Select Temple District</label>
                                    <div class="col-md-7">
                                        <select class="form-control" id="templeDistrict" name="templeDistrict">
                                            <option value="0">Gampaha</option>
                                            <option value="1">Kandy</option>
                                            <option value="2">Colombo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Temple Address</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="4" type="text" id="templeAddress" name="templeAddress" placeholder="Enter Temple Address"></textarea>
                                    </div>
                                    <label class="control-label col-md-5">This is Primary Phone Number</label>
                                    <div class="col-md-7">
                                        <div class="toggle lg">
                                            <label>
                                                <input type="checkbox" id="templePhonePrimary" name="templePhonePrimary"><span class="button-indecator"></span>
                                            </label>
                                        </div>
                                    </div>
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



    {{--    =====================================  Phone  ====================================================================================================================Form--}}
    {{-------------------------------------------------------------------------------------------------------Create Phone--}}
    <div class="modal fade" id="addPModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Add New Phone Number</h4>
                </div>
                <form method="POST" action=" ">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label col-md-5">Enter Phone Number</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7" type="text" id="templePhone"  name="templePhone"  placeholder="Enter Vegetarian Monk">
                                    </div>
                                    <label class="control-label col-md-5">This is Primary Phone Number</label>
                                    <div class="col-md-7">
                                        <div class="toggle lg">
                                            <label>
                                                <input type="checkbox" id="templePhonePrimary" name="templePhonePrimary"><span class="button-indecator"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" data-dismiss="modal" class="btn">Close</a>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-------------------------------------------------------------------------------------------------------Update Phone--}}
    <div class="modal fade" id="updatePModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Update Phone Number</h4>
                </div>
                <form method="POST" action=" ">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label col-md-5">Enter Phone Number</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7" type="text" id="templePhone"  name="templePhone"  placeholder="Enter Vegetarian Monk">
                                    </div>
                                    <label class="control-label col-md-5">This is Primary Phone Number</label>
                                    <div class="col-md-7">
                                        <div class="toggle lg">
                                            <label>
                                                <input type="checkbox" id="templePhonePrimary" name="templePhonePrimary"><span class="button-indecator"></span>
                                            </label>
                                        </div>
                                    </div>
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

    {{--    =====================================  Phone  ====================================================================================================================Form--}}

    {{-------------------------------------------------------------------------------------------------------Create Email--}}
    <div class="modal fade" id="addEModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Add New Email</h4>
                </div>
                <form method="POST" action=" ">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label col-md-5">Enter Email</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7" type="text" id="templeEmail" name="templeEmail" placeholder="Enter Temple Email"></input>
                                    </div>
                                    <label class="control-label col-md-5">This is Primary Email</label>
                                    <div class="col-md-7">
                                        <div class="toggle lg">
                                            <label>
                                                <input type="checkbox" id="templeEmailPrimary" name="templeEmailPrimary"><span class="button-indecator"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" data-dismiss="modal" class="btn">Close</a>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-------------------------------------------------------------------------------------------------------Update Email--}}
    <div class="modal fade" id="updateEModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Update Email</h4>
                </div>
                <form method="POST" action=" ">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label col-md-5">Update Email</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7" type="text" id="templeEmail" name="templeEmail" placeholder="Enter Temple Email"></input>
                                    </div>
                                    <label class="control-label col-md-5">This is Primary Emailr</label>
                                    <div class="col-md-7">
                                        <div class="toggle lg">
                                            <label>
                                                <input type="checkbox" id="templeEmailPrimary" name="templeEmailPrimary"><span class="button-indecator"></span>
                                            </label>
                                        </div>
                                    </div>
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

    {{-------------------------------------------------------------------------------------------------------Delete --}}
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
                                        <h5>Do you really want to delete these data? This process cannot be undone.</h5>
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
