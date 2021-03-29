@extends('layout.login')

@section('title','Registartion')

@section('body-content')

    <div class="row">
        <div class="col-md-9"   >
            <div class="card">

                    <h3 class="card-title">Register</h3>
                    <div class="card-body">
                        <form>
                            <div class="form-group" >
                                <label class="control-label">Temple Name</label>
                                <input class="form-control" type="text" placeholder="Enter Temple name">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Temple Description</label>
                                <textarea class="form-control" rows="8" placeholder="Enter Temple Info"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Chief Monk Name</label>
                                <input class="form-control" type="email" placeholder="Enter Chief Monk Name">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Address</label>
                                <textarea class="form-control" rows="4" placeholder="Enter your address"></textarea>
                            </div>
                            <label class="control-label">Location</label>
                            <div class="form-group">
                                <label class="control-label">Select Longitude</label>
                                <input class="form-control" type="email" placeholder="Select Longitude">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Select Latitude</label>
                                <input class="form-control" type="email" placeholder="Select Latitude">
                            </div>
                            <label class="control-label">Meal Type</label>
                            <div class="form-group">
                                <label class="control-label">Vegetarian Monk Count</label>
                                <input class="form-control" type="email" placeholder="Enter Vegetarian Monk Count">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Non-Vegetarian Monk Count</label>
                                <input class="form-control" type="email" placeholder="Enter Non-Vegetarian Monk Count">
                            </div>


                            <label class="control-label">Select Temple Catergory</label>
                            <div class="btn-group"><a class="btn btn-default dropdown-toggle" href="#" data-toggle="dropdown">Temple Catergory<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Purana Vihara</a></li>
                                    <li><a href="#">Dropdown link</a></li>
                                    <li><a href="#">Dropdown link</a></li>
                                </ul>
                            </div>



                            <div class="form-group">
                                <label class="control-label">Select Image</label>
                                <input class="form-control" type="file">
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox">I accept the terms and conditions
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary icon-btn" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-default icon-btn" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
            </div>
        </div>
    </div>


@endsection
