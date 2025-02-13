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
                    <h3 class="card-title">Dane Schedule Table</h3>
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Dane Time</th>
                            <th>Monk Count</th>
                            <th>BF Count</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($response['tableData'] as $row)
                            <tr>
                                <td>{{$row['id']}}</td>
                                <td>{{$row['date']}}</td>
                                <td>{{$row['daneTimeName']}}</td>
                                <td>{{$row['monkCount']}}</td>
                                <td>{{$row['bfCount']}}</td>
                                @if($row['isBook'])
                                    <td class="text-primary">Approved</td>
                                    <td>
                                        <button class="btn btn-success" onclick="viewModel({{$row['id']}})"><i
                                                class="fa fa-eye"></i></button>

                                        <button class="btn btn-warning" onclick="viewUpdateModel({{$row['id']}})"><i
                                                class="fa fa-edit"></i></button>


                                    </td>
                                @else
                                    <td class="text-warning">Not Approved</td>
                                    <td>
                                        <button class="btn btn-success" onclick="viewModel({{$row['id']}})"><i
                                                class="fa fa-eye"></i></button>

                                        <button class="btn btn-warning" onclick="viewUpdateModel({{$row['id']}})"><i
                                                class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger" onclick="viewDeleteModel({{$row['id']}})"><i
                                                class="fa fa-trash"></i></button>

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

{{-----------------------------------------------------------------------------------------------------Create Dane Schedule Model--}}
    <div class="modal fade" id="addModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Create Dane Schedule</h4>
                </div>
                <form method="POST" action="/templeAddDaneSchedule">
                    @csrf
                    <div class="model-body">
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-5" for="inputSmall">Select Dane Date</label>
                                        <div class="col-md-7">
                                            <input class="form-control col-md-7 input-sm"  type="text" id="daneDate" name="daneDate" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-12" ></label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5" >Select Dane Time</label>
                                        <div class="col-md-7">
                                            <select class="form-control" id="daneTime" name="daneTime">
                                                <option value="0">All</option>
                                                <option value="1">BreakFast</option>
                                                <option value="2">Lunch</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-12" ></label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Available Monk Count</label>
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

    {{-----------------------------------------------------------------------------------------------------Update Dane Schedule Model--}}
    <div class="modal fade" id="updateModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Update Dane Schedule</h4>
                </div>
                <form method="POST" action="/templeUpdateDaneSchedule">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">
                                <input type="hidden" id="updateDaneScheduleID" name="id">
                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">Select Dane Date</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7 input-sm"  type="text" id="updatedaneDate" name="updatedaneDate" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5" >Select Dane Time</label>
                                    <div class="col-md-7">
                                        <select class="form-control" id="updatedaneTime" name="updatedaneTime">
                                            <option value="0">All</option>
                                            <option value="1">BreakFast</option>
                                            <option value="2">Lunch</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Available Monk Count</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7" type="number" id="updatemonkCount"  name="updatemonkCount" placeholder="Enter Monk Count">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5">Vegetarian Monk Count</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7" type="number" id="updatevegMonkCount" name="updatevegMonkCount"  placeholder="Enter Vegetarian Monk">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Non-Vegetarian Monk Count</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7" type="number"   id="updatenonVegMonkCount" name="updatenonVegMonkCount"  placeholder="Enter Non-Vegetarian Monk">
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


    {{-----------------------------------------------------------------------------------------------------View Dane Schedule Model--}}
    <div class="modal fade" id="viewModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Dane Schedule</h4>
                </div>
                <form method="POST" action="/templeDaneSchedule/{id}">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Dane Date</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="viewdaneDate" name="viewdaneDate" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Dane Time</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="viewdaneTime" name="viewdaneTime" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Available Monk Count</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="viewmonkCount" name="viewmonkCount" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Vegetarian Monk Count</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="viewvegMonkCount" name="viewvegMonkCount" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Non-Vegetarian Monk Count</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="viewnonVegMonkCount" name="viewnonVegMonkCount" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Assigned Buddhist Followers Count</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="viewbfCount" name="viewbfCount" ></p>
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


    {{-----------------------------------------------------------------------------------------------------Delete Dane Schedule Model--}}
    <div class="modal fade" id="deleteModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="login-head"align="center"><i class="fa fa-times-circle" ></i>Are you sure?</h3>

                </div>
                <form method="POST" action="/templeDeleteDaneSchedule">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">
                                <input type="hidden" id="deleteDaneScheduleID" name="id">


                                <div class="form-group">

                                    <div class="col-md-10">
                                        <h5>Do you really want to delete these schedule? This process cannot be undone.</h5>
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
        $('#daneDate').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true
        });
        $('#updatedaneDate').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true
        });


        function viewUpdateModel(id){
            $.ajax({
                type: "GET",
                url: '/templeDaneSchedule/'+id,
            }).done(function(res) {

                $('#updateDaneScheduleID').val(id);
                $('#updatedaneDate').val(res['date']);
                $('#updatedaneTime').val(res['dane_time_id']);
                $('#updatemonkCount').val(res['monkCount']);
                $('#updatevegMonkCount').val(res['vegMonkCount']);
                $('#updatenonVegMonkCount').val(res['nonVegMonkCount']);
                $('#updateModel').modal('show');
            });


        }


        function viewModel(id){
            $.ajax({
                type: "GET",
                url: '/templeDaneSchedule/'+id,
            }).done(function(res) {

                $('#viewdaneDate').text(res['date']);
                $('#viewdaneTime').text(res['daneTimeName']);
                $('#viewmonkCount').text(res['monkCount']);
                $('#viewvegMonkCount').text(res['vegMonkCount']);
                $('#viewnonVegMonkCount').text(res['nonVegMonkCount']);
                $('#viewbfCount').text(res['bfCount']);
                $('#viewModel').modal('show');
            });


        }

        function viewDeleteModel(id){
            $('#deleteDaneScheduleID').val(id);
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
