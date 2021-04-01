@extends('layout.app')

@section('title','Dhamma School Event Management')

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
                <button class="btn btn-success btn-block"data-toggle="modal" href="#addModel">Add</button>
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
                    <h3 class="card-title">Dhamma School Events Table</h3>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Catergory</th>
                            <th>Information</th>
                            <th>Publish Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Exam</td>
                            <td>2</td>
                            <td>Semester one exam for grade 1-10</td>
                            <td>2021/05/06</td>
                            <td>2021/05/18</td>
                            <td><p class="text-success">Approved</p></td>
                            <td><button class="btn btn-success"data-toggle="modal" href="#viewModel"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-warning"data-toggle="modal" href="#updateModel"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger"data-toggle="modal" href="#deleteModel"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Exam Final</td>
                            <td>2</td>
                            <td>Semester one exam for grade 1-10</td>
                            <td>2021/05/05</td>
                            <td>2021/05/10</td>
                            <td><p class="text-warning">Not-Approved</p></td>
                            <td><button class="btn btn-success" data-toggle="modal" href="#viewModel" ><i class="fa fa-eye"></i></button>
                                <button class="btn btn-warning" data-toggle="modal" href="#updateModel"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger" data-toggle="modal" href="#deleteModel"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





    {{-----------------------------------------------------------------------------------------------------Create Event--}}
    <div class="modal fade" id="addModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Create Dhamma School Event</h4>
                </div>
                <form method="POST" action=" ">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Event Date</u></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">Select Start Date</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7 input-sm"  type="Date" id="eventFromDate" name="eventFromDate" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">Select End Date</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7 input-sm"  type="Date" id="eventEndDate" name="eventEndDate" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Event Time</u></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">Select Start Time</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7 input-sm"  type="Time" id="eventStartTime" name="eventStartTime" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">Select End Time</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7 input-sm"  type="Time" id="eventEndTime" name="eventEndTime" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Select Event Category</label>
                                    <div class="col-md-7">
                                        <select class="form-control" id="eventCategory" name="eventCategory">
                                            <option value="0">Darmadeshana</option>
                                            <option value="1">KatinePinkan</option>
                                            <option value="2">Bodi Pooja</option>
                                            <option value="3">Ashirwada Pooja</option>
                                            <option value="4">Repairing</option>
                                            <option value="5">Shramadana</option>
                                            <option value="6">DayakaSaba Reswim</option>
                                            <option value="7">Bill Paymnet</option>
                                            <option value="8">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Event Name</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="2" type="text" id="eventName" name="eventName" placeholder="Enter Event Name"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Event Description</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="6" type="text" id="eventInfo" name="eventInfo" placeholder="Enter Event Description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Event Location</u></label>
                                </div>
                                <label class="control-label col-md-5">Event Longitude</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text" id="eventLongitude" name="eventLongitude" placeholder="Enter Event Longitude"></input>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <label class="control-label col-md-5">Event Latitude</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text"  id="eventLatitude" name="eventLatitude" placeholder="Enter Event Latitude"></input>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Image</u></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">Event Image</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7" id="eventImage" name="eventImage" type="file">
                                    </div>
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

    {{-----------------------------------------------------------------------------------------------------Update Event--}}
    <div class="modal fade" id="updateModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Update Dhamma School Event</h4>
                </div>
                <form method="POST" action=" ">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Event Date</u></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">Select Start Date</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7 input-sm"  type="Date" id="eventFromDate" name="eventFromDate" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">Select End Date</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7 input-sm"  type="Date" id="eventEndDate" name="eventEndDate" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Event Time</u></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">Select Start Time</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7 input-sm"  type="Time" id="eventStartTime" name="eventStartTime" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">Select End Time</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7 input-sm"  type="Time" id="eventEndTime" name="eventEndTime" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Select Event Category</label>
                                    <div class="col-md-7">
                                        <select class="form-control" id="eventCategory" name="eventCategory">
                                            <option value="0">Darmadeshana</option>
                                            <option value="1">KatinePinkan</option>
                                            <option value="2">Bodi Pooja</option>
                                            <option value="3">Ashirwada Pooja</option>
                                            <option value="4">Repairing</option>
                                            <option value="5">Shramadana</option>
                                            <option value="6">DayakaSaba Reswim</option>
                                            <option value="7">Bill Paymnet</option>
                                            <option value="8">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Event Name</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="2" type="text" id="eventName" name="eventName" placeholder="Enter Event Name"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Event Description</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="6" type="text" id="eventInfo" name="eventInfo" placeholder="Enter Event Description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Event Location</u></label>
                                </div>
                                <label class="control-label col-md-5">Event Longitude</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text" id="eventLongitude" name="eventLongitude" placeholder="Enter Event Longitude"></input>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <label class="control-label col-md-5">Event Latitude</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text"  id="eventLatitude" name="eventLatitude" placeholder="Enter Event Latitude"></input>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Image</u></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">Event Image</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7" id="eventImage" name="eventImage" type="file">
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

    {{-----------------------------------------------------------------------------------------------------View Event Model--}}
    <div class="modal fade" id="viewModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Dhamma School Event</h4>
                </div>
                <form method="POST" action=" ">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Event Date</u></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" >Start Date</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="eventFromDate" name="eventFromDate" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="inputSmall">End Date</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8 "  type="text" id="eventEndDate" name="eventEndDate" ></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Event Time</u></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Start Time</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8 "  ttype="text" id="eventStartTime" name="eventStartTime" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" >End Time</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8 "  type="text" id="eventEndTime" name="eventEndTime" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Select Event Category</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8" type="text" id="eventCategory" name="eventCategory"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Event Name</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="eventName" name="eventName"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Event Description</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="eventInfo" name="eventInfo"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Event Location</u></label>
                                </div>
                                <label class="control-label col-md-4">Event Longitude</label>
                                <div class="col-md-8">
                                    <p class="form-control col-md-8" type="text" id="eventLongitude" name="eventLongitude" ></p>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <label class="control-label col-md-4">Event Latitude</label>
                                <div class="col-md-8">
                                    <p class="form-control col-md-8" type="textView"  id="eventLatitude" name="eventLatitude" ></p>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Image</u></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="inputSmall">Event Image</label>
                                    <div class="col-md-8">
                                        <P class="form-control col-md-8" type="imageView"  id="eventImage" name="eventImage"></P>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" data-dismiss="modal" class="btn">Ok</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-----------------------------------------------------------------------------------------------------Delete Event Model--}}
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
                                        <h5>Do you really want to delete these event? This process cannot be undone.</h5>
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
