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
                <button class="btn btn-success btn-block">Add</button>
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
                            <td>Mawanella for allegedly damaging a Buddha statue,</td>
                            <td>2018/12/26</td>
                            <td><button type="button" class="btn btn-info">Info</button></td>
                            <td><button class="btn btn-success"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Damage Temple Property</td>
                            <td>Mawanella for allegedly damaging a Buddha statue,</td>
                            <td>2018/12/26</td>
                            <td><button type="button" class="btn btn-info">Info</button></td>
                            <td><button class="btn btn-success"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Damage Temple Property</td>
                            <td>Mawanella for allegedly damaging a Buddha statue,</td>
                            <td>2018/12/26</td>
                            <td><button type="button" class="btn btn-info">Info</button></td>
                            <td><button class="btn btn-success"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
