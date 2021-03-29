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
                            <td>Exams</td>
                            <td>2</td>
                            <td>Semester one exam for grade 1-10</td>
                            <td>2021/05/06</td>
                            <td>2021/05/18</td>
                            <td><button type="button" class="btn btn-info">Info</button></td>
                            <td><button class="btn btn-success"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Exams</td>
                            <td>2</td>
                            <td>Semester one exam for grade 1-10</td>
                            <td>2021/05/06</td>
                            <td>2021/05/18</td>
                            <td><button type="button" class="btn btn-info">Info</button></td>
                            <td><button class="btn btn-success"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Exams</td>
                            <td>2</td>
                            <td>Semester one exam for grade 1-10</td>
                            <td>2021/05/06</td>
                            <td>2021/05/18</td>
                            <td><button type="button" class="btn btn-info">Info</button></td>>
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
