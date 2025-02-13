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
                    <table class="table table-bordered" id="dataTable">
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
                        @foreach($response['tableData'] as $row)
                        <tr>
                            <td>{{$row['id']}}</td>
                            <td>{{$row['title']}}</td>
                            <td>{{$row['description']}}</td>
                            <td>{{$row['publishDate']}}</td>
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

    {{-----------------------------------------------------------------------------------------------------Create News Model--}}
    <div class="modal fade" id="addModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Create News</h4>
                </div>
                <form method="POST" action="/templeAddNews">
                    @csrf
                    <div class="model-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">News Title</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="3" type="text" id="title" name="title"
                                                  placeholder="Enter News Title"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12"></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">News Description</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="10" type="text" id="description"
                                                  name="description" placeholder="Enter News Description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12"></label>
                                </div>


{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-5" for="inputSmall">Publish Date</label>--}}
{{--                                    <div class="col-md-7">--}}
{{--                                        <input class="form-control col-md-7 input-sm" type="text" id="publishDate"--}}
{{--                                               name="publishDate">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label class="control-label col-md-12"></label>
                                </div>

                                {{--                                <div class="form-group">--}}
                                {{--                                    <label class="control-label col-md-5" for="inputSmall">News Image</label>--}}
                                {{--                                    <div class="col-md-7">--}}
                                {{--                                        <input class="form-control col-md-7" id="newsImage" name="newsImage" type="file">--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                <div class="form-group">
                                    <label class="control-label col-md-12"></label>
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
                <form method="POST" action="/templeUpdateNews">
                    @csrf
                    <div class="model-body">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" id="updateNewsID" name="id">
                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">News Title</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="3" type="text" id="updateTitle"
                                                  name="updateTitle" placeholder="Enter News Title"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12"></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">News Description</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="10" type="text" id="updateDescription"
                                                  name="updateDescription" placeholder="Enter News Description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12"></label>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-5" for="inputSmall">Publish Date</label>
                                    <div class="col-md-7">
                                        <input class="form-control col-md-7 input-sm" type="text" disabled="true" id="updatePublishDate"
                                               name="updatePublishDate">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12"></label>
                                </div>

{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-5" for="inputSmall">News Image</label>--}}
{{--                                    <div class="col-md-7">--}}
{{--                                        <input class="form-control col-md-7" id="newsImage" name="newsImage"--}}
{{--                                               type="file">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label class="control-label col-md-12"></label>
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
                <form method="POST" action="/templeNews/{id}">

                    @csrf
                    <div class="model-body">
                        <div class="row">
                            <input type="hidden" id="viewNewsID" name="id">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="inputSmall">News Title</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8" type="text" id="viewNewsTitle"
                                           name="viewNewsTitle"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12"></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">News Description</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8" type="text" id="viewNewsInfo" name="viewNewsInfo"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12"></label>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-4" for="inputSmall">Publish Date</label>
                                    <div class="col-md-8">
                                        <p class="form-control col-md-8" type="text" id="viewNewsDate" name="viewNewsDate"></p>
                                    </div>
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-12"></label>--}}
{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label col-md-4" for="inputSmall">News Image</label>--}}
{{--                                    <div class="col-md-8">--}}
{{--                                        <P class="form-control col-md-8" type="imageView" id="newsImage"--}}
{{--                                           name="newsImage"></P>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label class="control-label col-md-12"></label>
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
                    <h3 class="login-head" align="center"><i class="fa fa-times-circle"></i>Are you sure?</h3>

                </div>
                <form method="POST" action="/templeDeleteNews">
                    @csrf
                    <input type="hidden" id="deleteNewsID" name="id">
                    <div class="model-body">
                        <div class="row">
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

@section('js-content')
    <script type="text/javascript">
        // $('#publishDate').datepicker({
        //     format: "yyyy-mm-dd",
        //     autoclose: true,
        //     todayHighlight: true
        // });
        //
        // $('#updatePublishDate').datepicker({
        //     format: "yyyy-mm-dd",
        //     autoclose: true,
        //     todayHighlight: true
        // });

        function viewUpdateModel(id){
            $.ajax({
                type: "GET",
                url: '/templeNews/'+id,
            }).done(function(res) {

                $('#updateNewsID').val(id);
                $('#updateTitle').text(res['title']);
                $('#updateDescription').text(res['description']);
                $('#updatePublishDate').val(res['publishDate']);
                $('#updateModel').modal('show');
            });


        }

        function viewDeleteModel(id){
            $('#deleteNewsID').val(id);
            $('#deleteModel').modal('show');
        }

        function viewModel(id){
            $.ajax({
                type: "GET",
                url: '/templeNews/'+id,
            }).done(function(res) {

                $('#viewNewsID').val(id);
                $('#viewNewsTitle').text(res['title']);
                $('#viewNewsInfo').text(res['description']);
                $('#viewNewsDate').text(res['publishDate']);
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
