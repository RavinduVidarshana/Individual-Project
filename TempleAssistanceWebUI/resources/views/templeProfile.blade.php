@extends('layout.app')

@section('title','Temple Dane Schedule')

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
        <div class="content-wrapper">
            <div class="row user">
                <div class="col-md-12">
                    <div class="profile">

                        <div class="info"><img class="user-img" src="images/user.png">
                            <h4><p class="form-control col-md-8"  type="text" id="templeName" name="templeName" >Main Monk Name</p></h4>
                            <p class="form-control col-md-8"  type="text" id="mainMonk" name="mainMonk" >Main Monk Name</p>
                        </div>

                        <div class="cover-image"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12" ></label>
                </div>


                <div class="col-md-12">
                    <div class="card p-2">

                            <div class="row" >

                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Temple Name</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="templeName" name="templeName" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-4">Temple Description</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="templeInfo" name="templeInfo" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Temple Category</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="templeCategory" name="templeCategory" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Monk Details</u></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Main Monk Name</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="mainMonk" name="mainMonk" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Monk Count</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="monkCount" name="monkCount" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Vegetarian Monk Count</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="vegMonkCount" name="vegMonkCount" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Non-Vegetarian Monk Count</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="nonVegMonkCount" name="nonVegMonkCount" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Temple About</u></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Temple Province</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="templeProvince" name="templeProvince" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Temple District</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="templeDistrict" name="templeDistrict" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Temple Address</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="templeAddress" name="templeAddress" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Temple Phone</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="templePhone" name="templePhone" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Temple Email</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="templeEmail" name="templeEmail" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Temple Location</u></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Temple Longitude</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="templeLongitude" name="templeLongitude" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Temple Latitude</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="templeLatitude" name="templeLatitude" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Temple Permission</u></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Temple UserName</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="templeUN" name="templeUN" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <button class="btn btn-success btn-block"data-toggle="modal" href="#updateModel">Edit Profile</button>

                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-----------------------------------------------------------------------------------------------------UPdate Temple--}}
    <div class="modal fade" id="updateModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Create Temple Account</h4>
                </div>
                <form method="POST" action=" ">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">



                                <div class="form-group">
                                    <label class="control-label col-md-5">Temple Name</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="3" type="text" id="templeName" name="templeName" placeholder="Enter Temple Name"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Temple Description</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="6" type="text" id="templeInfo" name="templeInfo" placeholder="Enter Temple Description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5" >Select Temple Category</label>
                                    <div class="col-md-7">
                                        <select class="form-control" id="templeCategory" name="templeCategory">
                                            <option value="0">General Temple</option>
                                            <option value="1">Rajamaha Vihara</option>
                                            <option value="2">Purana Vihara</option>
                                            <option value="3">Asapu</option>
                                            <option value="4">Meditation Center</option>
                                            <option value="5">Aranya Senasana</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Monk Details</u></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5">Main Monk Name</label>
                                    <div class="col-md-7">
                                        <input class="form-control"  type="text" id="mainMonk"  name="mainMonk" placeholder="Enter Main Monk Name"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Monk Count</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7" type="number" id="monkCount"  name="monkCount" placeholder="Enter Monk Count">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Vegetarian Monk Count</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7" type="number" id="vegMonkCount"  name="vegMonkCount"  placeholder="Enter Vegetarian Monk">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Non-Vegetarian Monk Count</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7" type="number" id="nonVegMonkCount" name="nonVegMonkCount"  placeholder="Enter Non-Vegetarian Monk">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Temple About</u></label>
                                </div>
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
                                    <label class="control-label col-md-12" ></label>
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
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <label class="control-label col-md-5">Temple Address</label>
                                <div class="col-md-7">
                                    <textarea class="form-control" rows="4" type="text" id="templeAddress" name="templeAddress" placeholder="Enter Temple Address"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <label class="control-label col-md-5">Temple Phone</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text" id="templePhone" name="templePhone" placeholder="Enter Temple Phone"></input>
                                </div>
                                <label class="control-label col-md-5">This is Primary Phone Number</label>
                                <div class="col-md-7">
                                    <div class="toggle lg">
                                        <label>
                                            <input type="checkbox" id="templePhonePrimary" name="templePhonePrimary"><span class="button-indecator"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <label class="control-label col-md-5">Temple Email</label>
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
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>



                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Temple Location</u></label>
                                </div>
                                <label class="control-label col-md-5">Temple Longitude</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text" id="templeLongitude" name="templeLongitude" placeholder="Enter Temple Longitude"></input>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <label class="control-label col-md-5">Temple Latitude</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text"  id="templeLatitude" name="templeLatitude" placeholder="Enter Temple Latitude"></input>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Temple Permission</u></label>
                                </div>
                                <label class="control-label col-md-5">Temple User Name</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text" id="templeUN" name="templeUN" placeholder="Enter User Name"></input>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <label class="control-label col-md-5">Temple Password</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="password"  id="templePWD" name="templePWD" placeholder="Enter Password"></input>
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


@endsection
