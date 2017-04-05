<!-- extended app.blade.php file located in client directory -->
@extends('client.app')

<!-- page title section start -->
@section('title')
    Shokes
@endsection
<!-- page title section end  -->

<!-- page content section start -->
@section('content')
<!-- posting your project container start -->
    <div class="col-md-12" style="height:300px;">
        <div class="col-md-4 col-md-offset-4 center" style = "text-align: center;">
            <h3 class="title">SELECT YOUR PROJECT CATEGORY</h3>
        </div>
    </div>
    <div class="widget-body">
        <div class="innerLR">
            <form class="form-horizontal" action="{!! URL('/client/store') !!}" role="form" method="post">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <!-- project category start -->
                <div class="col-md-2 space clickable"  id="machine learning" style="margin-top:0"><img src="{{asset('img/seo-monitoring.png')}}" style="height:8em">
                    <p>Machine Learning</p>
                </div>
                <div class="col-md-2 col-md-offset-1 space clickable" id = "Andriod Development" style ="margin-top:0"> <img src = "{{asset('img/web-development.png')}}" style="height:8em">
                    <p>Andriod Development</p>
                </div>
                <div class="col-md-2 col-md-offset-1 space clickable" id = "web development" style ="margin-top:0"s> <img src = "{{asset('img/landing-page.png')}}" style = "height:8em">
                    <p>Web Development</p>
                </div>
                <!-- project category end -->

                <!-- project initial description start -->
                <div class="col-md-12">
                    <div class="col-md-1 col-md-offset-1">
                        <h2 class="numberCircle">1</h2>
                    </div>
                    <div class="col-md-4" style = "margin-top:5px">
                        <h3 class="title">What is about your project about?</h3>
                        <p style="font-weight:700;color:grey"> Project name:</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-7 col-md-offset-2" style="margin-left:18%;">
                        <input type="text" class="form-control input_" name="name" placeholder="What you want us to do" style="box-shadow: none">
                    </div>
                </div>
                <!-- project initial description end -->

                <!-- project skills required description start -->
                <div class="col-md-12">
                    <div class="col-md-1 col-md-offset-1">
                        <h2 class="numberCircle">2</h2>
                    </div>
                    <div class="col-md-4" style = "margin-top:5px">
                        <h3 class="title">Tells us more about your project?</h3>
                        <p style="font-weight:700;color:grey">Skills needed:</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="col-sm-10">
                            <select class="input_ form-control" type="text" multiple = "multiple" name = 'skills' id = "skill_list" placeholder="select the skills">
                                <option disabled = "disabled" value = "FrontEnd">Frontend development</option>
                                <option value = "javascript">javascript</option>
                                <option value = "Node.js">Node.js</option>
                                <option value = "Python">Python</option>
                                <option value = "Css">Css</option>
                                <option disabled = "disabled" value = "FrontEnd">Frontend development</option>
                                <option value = "Mysql">Mysql</option>
                                <option value = "GoogleAnalytics">Analytics</option>
                                <option value = "MongoDB">MongoDB</option>
                            </select>
                        </div>
                        <div class="col-sm-10" style="margin-top:5%">
                            <p style="font-weight:700;color:grey">Please give us more information about your project</p>
                            <textarea  class="input_" name="description" cols="95" rows="5" placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>
                <!-- project skills required description end -->

                <!-- project open period description start -->
                <div class="col-md-12">
                    <div class="col-md-1 col-md-offset-1">
                        <h2 class="numberCircle">3</h2>
                    </div>
                    <div class="col-md-4" style="margin-top:5px">
                        <h3 class="title">Tells us about your project open period?</h3>
                    </div>
                    <div class="form-group">
                    <!-- project budget start -->
                        <div class="col-md-10 col-md-offset-2" style="margin-top:1%;margin-left:18%">
                            <p style="font-weight:700;color:grey">Budget</p>
                        </div>
                        <div class="col-md-3 col-md-offset-2" style="margin-left:18%">
                            <input type="int" class="form-control input_" name="Budget" placeholder="$" style="color:grey">
                        </div>
                        <!-- project budget end -->

                        <!-- project estimated time start -->
                        <div class="col-md-10 col-md-offset-2" style="margin-top:2%;margin-left:18%">
                            <p style="font-weight:700;color:grey">Ending Time</p>
                        </div>
                        <div class="col-md-3 col-md-offset-2" style="margin-left:18%">
                            <input type="date" class="form-control input_" name="Endtime" placeholder="Estimate Time" style ="color:grey">
                        </div>
                        <!-- project estimated time end -->
                    </div>
                </div>
                <!-- project open period description end -->
                <div class="col-md-12" style="height:200px">
                    <div class="col-md-1 col-md-offset-1">
                        <h2 class="numberCircle">4</h2>
                    </div>
                    <!-- upload code start -->
                    <div class="col-md-4" style="margin-top:5px">
                        <h3 class="title">Upload your code</h3>
                        <p style="font-weight:700;color:grey">Upload Current Code</p>
                    </div>
                    <div class="col-md-6" style="height:150px"></div>
                    <div class="col-md-2 col-md-offset-2 upload">
                        <h4 class="title"><a>+ Upload File</a></h4>
                    </div>
                    <!-- upload code end -->
                </div>
                <div class="form-group">
                    <!-- post you project container start -->
                    <div class="col-md-12" style="margin-top:3%;height:200px">
                        <div class="col-sm-6 col-sm-offset-2">
                            <button type="submit" class="btn btn-lg btn-info">Post Your Project Now</button>
                            <a href="{!! URL::route('task') !!}" class="btn btn-lg btn-info pull-right margin-bottom-xs">Cancel</a>
                        </div>
                    </div>
                    <!-- post you project container end -->
                </div>
            </form>
        </div>
    </div>
<!-- posting your project container start -->

<!-- validation error container start  -->
    @if($errors->has())
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
<!-- validation error container end  -->
@endsection
<!-- page content section end -->

<!-- custom javascript block start -->
@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            /**
             * onclikc make active
             * @param  {bool}
             * @return {addClass/removeClass}
             */
            $(".clickable").click(function(){
            if($(".clickable").hasClass("active")){
                $(".clickable").removeClass("active"); //remove class active if already active
            }
                $(this).addClass("active"); //add class active onclick
            });
        });
        /**
         * skill set select
         * @type {String}
         */
        $('#skill_list').select2({
            placeholder:'Choose the talents',
            tags:true
        });
    </script>
@endsection
<!-- custom javascript block end -->