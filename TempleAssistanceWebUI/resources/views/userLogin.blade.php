@extends('layout.login')

@section('title','Login')

@section('body-content')
    <section class="login-content">
        <div class="logo">
            <h1>Temple Assistance</h1>
        </div>
        <div class="login-box">
            <form class="login-form" method="POST" action="{{url('/userLogin')}}">
                @csrf
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>

                <div class="form-group">
                    <label class="control-label">USERNAME</label>
                    <input class="form-control" type="text" name="username" placeholder="Email" autofocus>
                </div>
                <div class="form-group">
                    <label class="control-label">PASSWORD</label>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <div class="utility">
                        <div class="animated-checkbox">
                            <label class="semibold-text">
                                <input type="checkbox"><span class="label-text">Stay Signed in</span>
                            </label>
                        </div>
{{--                        <p class="semibold-text mb-0"><a data-toggle="flip">Forgot Password ?</a></p>--}}
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
                </div>
                <br>
                <a data-toggle="modal" href="#addModel"><u>Create an account</u></a>



            </form>
{{--            <form class="forget-form" action="index.html">--}}
{{--                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>--}}
{{--                <div class="form-group">--}}
{{--                    <label class="control-label">EMAIL</label>--}}
{{--                    <input class="form-control" type="text" placeholder="Email">--}}
{{--                </div>--}}
{{--                <div class="form-group btn-container">--}}
{{--                    <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>--}}
{{--                </div>--}}
{{--                <div class="form-group mt-20">--}}
{{--                    <p class="semibold-text mb-0"><a data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>--}}
{{--                </div>--}}
{{--            </form>--}}
        </div>
    </section>


    {{-----------------------------------------------------------------------------------------------------Create Temple--}}
    <div class="modal fade" id="addModel" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="daneModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="daneModelLabel" align="center">Create Temple Account</h4>
                </div>
                <form method="POST" action=" ">
                    @csrf
                    <div class="model-body">
                        <div class="row" >
                            <div class="col-md-12">



                                <div class="form-group">
                                    <label class="control-label col-md-5">Temple Name</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="3" type="text" id="templeName" name="templeName" placeholder="Enter Temple Name"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Temple Description</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="6" type="text" id="templeInfo" name="templeInfo" placeholder="Enter Temple Description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5" >Select Temple Category</label>
                                    <div class="col-md-7">
                                        <select class="form-control" id="templeCategory" name="templeCategory">
                                            <option value="0">General Temple</option>
                                            <option value="1">Rajamaha Vihara</option>
                                            <option value="2">Purana Vihara</option>
                                            <option value="3">Asapu</option>
                                            <option value="4">Meditation Center</option>
                                            <option value="5">Aranya Senasana</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Monk Details</u></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5">Main Monk Name</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="2" type="text" id="mainMonk"  name="mainMonk" placeholder="Enter Main Monk Name"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5">Monk Count</label>
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


                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Temple Location</u></label>
                                </div>
                                <label class="control-label col-md-5">Temple Longitude</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text" id="templeLongitude" name="templeLongitude" placeholder="Enter Temple Longitude"></input>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <label class="control-label col-md-5">Temple Latitude</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text"  id="templeLatitude" name="templeLatitude" placeholder="Enter Temple Latitude"></input>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-12" for="inputSmall"><u>Temple Permission</u></label>
                                </div>
                                <label class="control-label col-md-5">Temple UserName</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="text" id="templeUN" name="templeUN" placeholder="Enter User Name"></input>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12" ></label>
                                </div>
                                <label class="control-label col-md-5">Temple Password</label>
                                <div class="col-md-7">
                                    <input class="form-control col-md-7" type="password"  id="templePWD" name="templePWD" placeholder="Enter Password"></input>
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

@section('js-content')
    @if(request()->get('msg'))
    <script type="text/javascript">
        $("document").ready(function () {
            $.notify({
                title: "Oops..!",
                message: "{{request()->get('msg')}}",
                icon: 'fa fa-check'
            },{
                type: "warning"
            });
        });

    </script>
    @endif
@endsection
