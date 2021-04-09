@extends('layout.app')

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

        <div class="form-group">
            <label class="control-label col-md-12" ></label>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="PUT" action="#">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Dhamma School Name</label>
                                        <p class="form-control col-md-8"  type="text" id="dhammaSchName" name="dhammaSchName" ></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Temple Name</label>
                                        <p class="form-control col-md-8"  type="text" id="templeName" name="templeName" ></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Registration Number</label>
                                        <p class="form-control col-md-8"  type="text" id="dhammaSchRegNum" name="dhammaSchRegNum" ></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Student Count</label>
                                        <p class="form-control col-md-8"  type="text" id="stdCount" name="stdCount" ></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Principle Name</label>
                                        <p class="form-control col-md-8"  type="text" id="dhammaSchPName" name="dhammaSchPName" ></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <hr class="mt-3 mb-3">
                                        <label class="control-label">Dhamma School About</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Province</label>
                                        <p class="form-control col-md-8"  type="text" id="dhammaSchProvince" name="dhammaSchProvince" ></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">District</label>
                                        <p class="form-control col-md-8"  type="text" id="dhammaSchDistrict" name="dhammaSchDistrict" ></p>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Address</label>
                                        <p class="form-control col-md-8"  type="text" id="dhammaSchAddress" name="dhammaSchAddress" ></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Phone</label>
                                        <p class="form-control col-md-8"  type="text" id="dhammaSchPhone" name="dhammaSchPhone" ></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <p class="form-control col-md-8"  type="text" id="dhammaSchEmail" name="dhammaSchEmail" ></p>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
    {{-----------------------------------------------------------------------------------------------------Create Dhamma School--}}
    <div class="modal fade" id="addModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Create Dhamma School</h4>
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
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
