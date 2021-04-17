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
                    <table class="table table-bordered" id="dataTable">
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
                        @foreach($response['tableData'] as $row)
                        <tr>
                            <td>{{$row['id']}}</td>
                            <td>{{$row['welfareName']}}</td>
                            <td>{{$row['welfareRegnum']}}</td>
                            <td>{{$row['welfareMemberCount']}}</td>
                            <td>{{$row['welfarePresident']}}</td>
                            <td>
{{--                                <button class="btn btn-success"data-toggle="modal" href="#viewModel"><i class="fa fa-eye"></i></button>--}}
                                <button class="btn btn-success"onclick="viewModel({{$row['id']}})"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-warning"onclick="viewUpdateModel({{$row['id']}})"><i class="fa fa-edit"></i></button>
{{--                                <button class="btn btn-danger"data-toggle="modal" href="#deleteModel"><i class="fa fa-trash"></i></button>--}}

                            </td>
                        </tr>
                        @endforeach
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
                <form method="POST" action="/templeAddWelfare">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">



                                <div class="form-group">
                                    <label class="control-label col-md-5">Welfare Society Name</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="2" type="text" id="welfareName" name="welfareName" placeholder="Welfare Society Name"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-5">Registration Number</label>
                                    <div class="col-md-7">
                                        <input class="form-control"  type="text" id="welfareRegnum"  name="welfareRegnum" placeholder="Enter Welfare Society Registration Number"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Member Count</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7" type="number" id="welfareMemberCount"  name="welfareMemberCount" placeholder="Enter Member Count"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">President Name</label>
                                    <div class="col-md-7">
                                        <input class="form-control"  type="text" id="welfarePresident"  name="welfarePresident" placeholder="Enter President Name"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Secretary Name</label>
                                    <div class="col-md-7">
                                        <input class="form-control"  type="text" id="welfareSecretary"  name="welfareSecretary" placeholder="Enter Secretary Name"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Treasure Name</label>
                                    <div class="col-md-7">
                                        <input class="form-control"  type="text" id="welfareTreasure"  name="welfareTreasure" placeholder="Enter Treasure Name"></input>
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
                                    <input class="form-control col-md-7" type="text" id="userName" name="userName" placeholder="Enter User Name"></input>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <label class="control-label col-md-5">Welfare Society Password</label>
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


    {{-----------------------------------------------------------------------------------------------------Update Welfare Society--}}
    <div class="modal fade" id="updateModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Update Welfare Society</h4>
                </div>
                <form method="POST" action="/templeUpdateWelfare">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">
                                <input type="hidden" id="updateWelfareID" name="id">
                                <div class="form-group">
                                    <label class="control-label col-md-5">Welfare Society Name</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="2" type="text" id="updatewelfareName" name="updatewelfareName" placeholder="Welfare Society Name"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-5">Registration Number</label>
                                    <div class="col-md-7">
                                        <input class="form-control"  type="text" id="updatewelfareRegnum"  name="updatewelfareRegnum" placeholder="Enter Welfare Society Registration Number"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Member Count</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7" type="number" id="updatewelfareMemberCount"  name="updatewelfareMemberCount" placeholder="Enter Member Count">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">President Name</label>
                                    <div class="col-md-7">
                                        <input class="form-control"  type="text" id="updatewelfarePresident"  name="updatewelfarePresident" placeholder="Enter President Name"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Secretary Name</label>
                                    <div class="col-md-7">
                                        <input class="form-control"  type="text" id="updatewelfareSecretary"  name="updatewelfareSecretary" placeholder="Enter Secretary Name"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Treasure Name</label>
                                    <div class="col-md-7">
                                        <input class="form-control"  type="text" id="updatewelfareTreasure"  name="updatewelfareTreasure" placeholder="Enter Treasure Name"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-5">Email</label>--}}
{{--                                    <div class="col-md-7">--}}
{{--                                        <input class="form-control"  type="text" id="updateEmail45"  name="updateEmail45" placeholder="Email"></input>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}


                                {{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" for="inputSmall"><u>Welfare Society Permission</u></label>--}}
{{--                                </div>--}}
{{--                                <label class="control-label col-md-5">Welfare Society User Name</label>--}}
{{--                                <div class="col-md-7">--}}
{{--                                    <input class="form-control col-md-7" type="text" id="updatepassword" name="updatepassword" placeholder="Enter User Name"></input>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}
{{--                                <label class="control-label col-md-5">Welfare Society Password</label>--}}
{{--                                <div class="col-md-7">--}}
{{--                                    <input class="form-control col-md-7" type="password"  id="updatepassword" name="updatepassword" placeholder="Enter Password"></input>--}}
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



    {{-----------------------------------------------------------------------------------------------------View Welfare Society--}}
    <div class="modal fade" id="viewModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Welfare Society</h4>
                </div>
                <form method="POST" action="/templeWelfareSociety/{id}">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label col-md-4">Welfare Society Name</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="viewwelfareSocietyName" name="viewwelfareSocietyName" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-4">Registration Number</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="viewwelfareSocietyRegNum" name="viewwelfareSocietyRegNum" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Member Count</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="viewmemberCount" name="viewmemberCount" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">President Name</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="viewwelfarePName" name="viewwelfarePName" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Secretary Name</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="viewwelfareSName" name="viewwelfareSName" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Treasure Name</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="viewwelfareTName" name="viewwelfareTName" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" for="inputSmall"><u>Welfare Society About</u></label>--}}
{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-4">Province</label>--}}
{{--                                    <div class="col-md-8">--}}
{{--                                        <p class="form-control col-md-8"  type="text" id="viewwelfareSocietyProvince" name="viewwelfareSocietyProvince" ></p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-4">District</label>--}}
{{--                                    <div class="col-md-8">--}}
{{--                                        <p class="form-control col-md-8"  type="text" id="viewwelfareSocietyDistrict" name="viewwelfareSocietyDistrict" ></p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}

                                <div class="form-group">
                                    <label class="control-label col-md-4">Address</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="viewwelfareSocietyAddress" name="viewwelfareSocietyAddress" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Phone</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="viewwelfareSocietyPhone" name="viewwelfareSocietyPhone" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Email</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="viewwelfareSocietyEmail" name="viewwelfareSocietyEmail" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" for="inputSmall"><u>Welfare Society Permission</u></label>--}}
{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-4">UserName</label>--}}
{{--                                    <div class="col-md-8">--}}
{{--                                        <p class="form-control col-md-8"  type="text" id="viewuserName" name="viewuserName" ></p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12" ></label>--}}
{{--                                </div>--}}

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


{{--    --}}{{-----------------------------------------------------------------------------------------------------Delete Welfare Society Model--}}
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
{{--                                        <h5>Do you really want to delete these welfare? This process cannot be undone.</h5>--}}
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

@section('js-content')
    <script type="text/javascript">

        function viewUpdateModel(id){
            $.ajax({
                type: "GET",
                url: '/templeWelfareSociety/'+id,
            }).done(function(res) {

                $('#updateWelfareID').val(id);
                $('#updatewelfareName').text(res['welfareName']);
                $('#updatewelfareRegnum').val(res['welfareRegnum']);
                $('#updatewelfareMemberCount').val(res['welfareMemberCount']);
                $('#updatewelfarePresident').val(res['welfarePresident']);
                $('#updatewelfareSecretary').val(res['welfareSecretary']);
                $('#updatewelfareTreasure').val(res['welfareTreasure']);

                // if(res['wfhp']!=[]){
                //     $('#updateEmail45').val(res['wfhp'][0]['phoneName']);
                // }

                // if(res['wfhe'].length!=0){
                //     $('#updateEmail45').val(res['wfhe'][0]['emailName']);
                //     // alert(res['wfhe'][0]['emailName']);
                // }
                //
                // // alert(res['wfhe'][0]['emailName']);
                $('#updateModel').modal('show');
            });


        }


        function viewModel(id){
            $.ajax({
                type: "GET",
                url: '/templeWelfareSociety/'+id,
            }).done(function(res) {


                $('#viewwelfareSocietyName').text(res['welfareName']);
                $('#viewwelfareSocietyRegNum').text(res['welfareRegnum']);
                $('#viewmemberCount').text(res['welfareMemberCount']);
                $('#viewwelfarePName').text(res['welfarePresident']);
                $('#viewwelfareSName').text(res['welfareSecretary']);
                $('#viewwelfareTName').text(res['welfareTreasure']);


                if(res['wfha'].length!=0){
                    var address=(res['wfha'][0]['addressLine1'])+' , '+(res['wfha'][0]['addressLine2']);
                    $('#viewwelfareSocietyAddress').text(address);
                    // alert(res['wfha'][0]['emailName']);
                }
                if(res['wfhp'].length!=0){
                    $('#viewwelfareSocietyPhone').text(res['wfhp'][0]['phoneName']);
                    // alert(res['wfhe'][0]['emailName']);
                }
                if(res['wfhe'].length!=0){
                    $('#viewwelfareSocietyEmail').text(res['wfhe'][0]['emailName']);
                    // alert(res['wfhe'][0]['emailName']);
                }

                $('#viewModel').modal('show');

            });


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
