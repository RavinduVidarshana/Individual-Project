@extends('layout.app')

@section('title','Temple Event Management')

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
                    <h3 class="card-title">Temple Events Table</h3>
                    <table class="table table-bordered" id="dataTable">
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
                        @foreach($response['tableData'] as $row)
                        <tr>
                            <td>{{$row['id']}}</td>
                            <td>{{$row['eventName']}}</td>
                            <td>{{$row['eventCatergoryName']}}</td>
                            <td>{{$row['eventInfo']}}</td>
                            <td>{{$row['eventDateFrom']}}</td>
                            <td>{{$row['eventDateTo']}}</td>
                            @if($row['isApproved'])
                                <td class="text-primary">Approved</td>
                                <td>
                                    <button class="btn btn-success" onclick="viewModel({{$row['id']}})"><i
                                            class="fa fa-eye"></i></button>

                                    <button class="btn btn-warning" onclick="viewUpdateModel({{$row['id']}})"><i
                                            class="fa fa-edit"></i></button>

                                    <button class="btn btn-danger" onclick="viewDeleteModel({{$row['id']}})"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            @else
                                <td class="text-warning">Not Approved</td>
                                <td>
                                    <button class="btn btn-success" onclick="viewModel({{$row['id']}})"><i
                                            class="fa fa-eye"></i></button>

                                    <button class="btn btn-warning" onclick="viewUpdateModel({{$row['id']}})"><i
                                            class="fa fa-edit"></i></button>

                                </td>
                            @endif
                        </tr>
                        @endforeach
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
                    <h4 class="modal-title" id="daneModelLabel" align="center">Create Temple Event</h4>
                </div>
                <form method="POST" action="/templeAddEvent">
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
                                        <input class="form-control col-md-7 input-sm"  type="text" id="eventFromDate" name="eventFromDate" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">Select End Date</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7 input-sm"  type="text" id="eventEndDate" name="eventEndDate" >
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
                                            @foreach($response['eventCategories'] as $option)
                                            <option value="{{$option['id']}}">{{$option['eventCatergoryName']}}</option>
                                            @endforeach
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
                                        <label class="control-label col-md-12" for="inputSmall"><u>Event About</u></label>
                                    </div>

                                <label class="control-label col-md-5">Event Phone</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text" id="eventPhone" name="eventPhone" placeholder="Enter Event Phone"></input>
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
                                <div class="form-group">

{{--                                  <div>--}}
{{--                                    <label class="control-label col-md-12" for="inputSmall"><u>Image</u></label>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-5" for="inputSmall">Event Image</label>--}}
{{--                                    <div class="col-md-7">--}}
{{--                                        <input class="form-control col-md-7" id="eventImage" name="eventImage" type="file">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}

                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" data-dismiss="modal" class="btn">Close</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

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
                    <h4 class="modal-title" id="daneModelLabel" align="center">Update Temple Event</h4>
                </div>
                <form method="POST" action="/templeUpdateEvent ">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">
                                <input type="hidden" id="updateEventID" name="id">

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Event Date</u></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">Select Start Date</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7 input-sm"  type="text" id="upeventFromDate" name="upeventFromDate" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">Select End Date</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7 input-sm"  type="text" id="upeventEndDate" name="upeventEndDate" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Event Time</u></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">Select Start Time</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7 input-sm"  type="Time" id="updateeventStartTime" name="updateeventStartTime" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">Select End Time</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7 input-sm"  type="Time" id="updateeventEndTime" name="updateeventEndTime" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Select Event Category</label>
                                    <div class="col-md-7">
                                        <select class="form-control" id="updateeventCategory" name="updateeventCategory">
                                            @foreach($response['eventCategories'] as $option)
                                                <option value="{{$option['id']}}">{{$option['eventCatergoryName']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Event Name</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="2" type="text" id="updateeventName" name="updateeventName" placeholder="Enter Event Name"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-5">Event Description</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="6" type="text" id="updateeventInfo" name="updateeventInfo" placeholder="Enter Event Description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>




                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Event About</u></label>
                                </div>

{{--                                <label class="control-label col-md-5">Event Address</label>--}}
{{--                                <div class="col-md-7">--}}
{{--                                    <textarea class="form-control" rows="4" type="text" id="eventAddress" name="eventAddress" placeholder="Enter Event Address"></textarea>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}

                                <label class="control-label col-md-5">Event Phone</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text" id="updateeventPhone" name="updateeventPhone" placeholder="Enter Event Phone"></input>
                                </div>
{{--                                <label class="control-label col-md-5">This is Primary Phone Number</label>--}}
{{--                                <div class="col-md-7">--}}
{{--                                    <div class="toggle lg">--}}
{{--                                        <label>--}}
{{--                                            <input type="checkbox" id="eventPhonePrimary" name="eventPhonePrimary"><span class="button-indecator"></span>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}

{{--                                <label class="control-label col-md-5">Event Email</label>--}}
{{--                                <div class="col-md-7">--}}
{{--                                    <input class="form-control col-md-7" type="text" id="eventEmail" name="eventEmail" placeholder="Enter Event Email"></input>--}}
{{--                                </div>--}}
{{--                                <label class="control-label col-md-5">This is Primary Email</label>--}}
{{--                                <div class="col-md-7">--}}
{{--                                    <div class="toggle lg">--}}
{{--                                        <label>--}}
{{--                                            <input type="checkbox" id="eventEmailPrimary" name="eventEmailPrimary"><span class="button-indecator"></span>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Event Location</u></label>
                                </div>
                                <label class="control-label col-md-5">Event Longitude</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text" id="updateeventLongitude" name="updateeventLongitude" placeholder="Enter Event Longitude"></input>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>


                                <label class="control-label col-md-5">Event Latitude</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text" id="updateeventLatitude" name="updateeventLatitude" placeholder="Enter Event Latitude"></input>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>


{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" for="inputSmall"><u>Image</u></label>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-5" for="inputSmall">Event Image</label>--}}
{{--                                    <div class="col-md-7">--}}
{{--                                        <input class="form-control col-md-7" id="eventImage" name="eventImage" type="file">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}

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
                    <h4 class="modal-title" id="daneModelLabel" align="center">Temple Event</h4>
                </div>
                <form method="POST" action="/templeEventManage/{id}">
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
                                        <p class="form-control col-md-8"  type="text" id="vieweventFromDate" name="vieweventFromDate" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="inputSmall">End Date</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8 "  type="text" id="vieweventEndDate" name="vieweventEndDate" ></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Event Time</u></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Start Time</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8 "  type="text" id="vieweventStartTime" name="vieweventStartTime" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" >End Time</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8 "  type="text" id="vieweventEndTime" name="vieweventEndTime" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Select Event Category</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8" type="text" id="vieweventCategory" name="vieweventCategory"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Event Name</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="vieweventName" name="vieweventName"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Event Description</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="vieweventInfo" name="vieweventInfo"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>



                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Event About</u></label>
                                </div>

                                <label class="control-label col-md-4">Event Phone</label>
                                <div class="col-md-8">

                                    <p class="form-control col-md-8"  type="text" id="vieweventPhone" name="vieweventPhone" ></p>

                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>



                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Event Location</u></label>
                                </div>
                                <label class="control-label col-md-4">Longitude</label>
                                <div class="col-md-8">
                                    <p class="form-control col-md-8" type="text" id="vieweventLongitude" name="vieweventLongitude" ></p>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <label class="control-label col-md-4">Latitude</label>
                                <div class="col-md-8">
                                    <p class="form-control col-md-8" type="text"  id="vieweventLatitude" name="vieweventLatitude" ></p>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" for="inputSmall"><u>Image</u></label>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-4" for="inputSmall">Event Image</label>--}}
{{--                                    <div class="col-md-8">--}}
{{--                                        <P class="form-control col-md-8" type="imageView"  id="eventImage" name="eventImage"></P>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}

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
                <form method="POST" action="/templeDeleteEvent ">
                    @csrf
                    <input type="hidden" id="deleteEventID" name="id">
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

@section('js-content')
    <script type="text/javascript">
        $('#eventFromDate').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true,
            orientation: 'bottom'
        });

        $('#eventEndDate').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true,
            orientation: 'bottom'
        });

        $('#upeventFromDate').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true,
            orientation: 'bottom'
        });

        $('#upeventEndDate').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true,
            orientation: 'bottom'
        });




        function viewUpdateModel(id){
            $.ajax({
                type: "GET",
                url: '/templeEventManage/'+id,
            }).done(function(res) {
                var from = res['eventDateFrom'].split(' ');
                var end = res['eventDateTo'].split(' ');

                $('#updateEventID').val(id);
                $('#upeventFromDate').val(from[0]);
                $('#upeventEndDate').val(end[0]);
                $('#updateeventStartTime').val(from[1]);
                $('#updateeventEndTime').val(end[1]);
               // $('#updateeventCategory').text(res['eventCategory']);
                $('#updateeventName').val(res['eventName']);
                $('#updateeventInfo').val(res['eventInfo']);
                $('#updateeventLongitude').val(res['longitude']);
                $('#updateeventLatitude').val(res['latitude']);
                $('#updateeventCategory').val(res['event_catergory_id']).change();

                 if(res['ehp'].length!=0){
                     $('#updateeventPhone').val(res['ehp'][0]['phoneName']);
                    // alert(res['ehp'][0]['phoneName']);
                 }


                $('#updateModel').modal('show');
            });


        }




        function viewModel(id) {
            $.ajax({
                type: "GET",
                url: '/templeEventManage/' + id,
            }).done(function (res) {

                var fromV = res['eventDateFrom'].split(' ');
                var endV = res['eventDateTo'].split(' ');

                $('#vieweventFromDate').text(fromV[0]);
                $('#vieweventEndDate').text(endV[0]);
                $('#vieweventStartTime').text(fromV[1]);
                $('#vieweventEndTime').text(endV[1]);
                $('#vieweventCategory').text(res['eventCatergoryName']);
                $('#vieweventName').text(res['eventName']);
                $('#vieweventInfo').text(res['eventInfo']);
                $('#vieweventLongitude').text(res['longitude']);
                $('#vieweventLatitude').text(res['latitude']);

                 if(res['ehp'].length!=0){
                     $('#vieweventPhone').text(res['ehp'][0]['phoneName']);
                    // alert(res['ehp'][0]['phoneName']);
                 }



                $('#viewModel').modal('show');
            });
        }



        function viewDeleteModel(id){
            $('#deleteEventID').val(id);
            $('#deleteModel').modal('show');
        }


    </script>

    @if(request()->get('msg'))
        <script type="text/javascript">
            $("document").ready(function () {
                $.notify({
                    title: "Oops..!",
                    message: "{{request()->get('msg')}}",
                    icon: 'fa fa-check'
                }, {
                    type: "warning"
                });
            });


        </script>
    @endif

    <script type="text/javascript">$('#dataTable').DataTable();</script>
@endsection


