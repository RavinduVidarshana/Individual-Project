@extends('layout.app')

@section('title','Temple News')

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
                    <h3 class="card-title">Temple News Table</h3>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Publish Date</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Damage Temple Property</td>
                            <td>Mawanella for allegedly damaging a Buddha statue</td>
                            <td>2018/12/26</td>
                            <td><p class="text-success">Approved</p></td>
                            <td>
                                <button class="btn btn-success" data-toggle="modal" href="#viewModel"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-warning"data-toggle="modal" href="#updateModel"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger"data-toggle="modal" href="#deleteModel"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Damage Temple Property</td>
                            <td>Mawanella for allegedly damaging a Buddha statue</td>
                            <td>2018/12/26</td>
                            <td><p class="text-success">Approved</p></td>
                            <td>
                                <button class="btn btn-success" data-toggle="modal" href="#viewModel"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-warning"data-toggle="modal" href="#updateModel"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger"data-toggle="modal" href="#deleteModel"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Damage Temple Property</td>
                            <td>Mawanella for allegedly damaging a Buddha statue</td>
                            <td>2018/12/26</td>
                            <td><p class="text-warning">Not-Approved</p></td>
                            <td>
                                <button class="btn btn-success" data-toggle="modal" href="#viewModel"><i class="fa fa-eye"></i></button>
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

    {{-----------------------------------------------------------------------------------------------------Create News Model--}}
    <div class="modal fade" id="addModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Create News</h4>
                </div>
                <form method="POST" action=" ">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">News Title</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="3"  type="text" id="newsTitle" name="newsTitle" placeholder="Enter News Title" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5" >News Description</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="10" type="text" id="newsInfo" name="newsInfo" placeholder="Enter News Description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">Publish Date</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7 input-sm"  type="Date" id="newsDate" name="newsDate" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">News Image</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7" id="newsImage" name="newsImage" type="file">
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

    {{-----------------------------------------------------------------------------------------------------Update News Model--}}
    <div class="modal fade" id="updateModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Update News</h4>
                </div>
                <form method="POST" action=" ">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">News Title</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="3"  type="text" id="newsTitle" name="newsTitle" placeholder="Enter News Title" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5" >News Description</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="10" type="text" id="newsInfo" name="newsInfo" placeholder="Enter News Description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">Publish Date</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7 input-sm"  type="Date" id="newsDate" name="newsDate" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">News Image</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7" id="newsImage" name="newsImage" type="file">
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


    {{-----------------------------------------------------------------------------------------------------View News Model--}}
    <div class="modal fade" id="viewModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">News</h4>
                </div>
                <form method="POST" action=" ">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="inputSmall">News Title</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="newsTitle" name="newsTitle"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" >News Description</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="newsInfo" name="newsInfo"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-4" for="inputSmall">Publish Date</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8"  type="text" id="newsDate" name="newsDate" ></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="inputSmall">News Image</label>
                                    <div class="col-md-8">
                                        <P class="form-control col-md-8" type="imageView"  id="newsImage" name="newsImage"></P>
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


    {{-----------------------------------------------------------------------------------------------------Delete News Model--}}
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
                                        <h5>Do you really want to delete these news? This process cannot be undone.</h5>
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
