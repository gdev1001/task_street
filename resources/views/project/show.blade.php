


        @if(($i-2)%4 == 0||($i-3)%4 ==0)

            <div class= 'col-md-6' style = "text-align:-webkit-center;padding-top:5%;height:550px">
        @else
                    <div class= 'col-md-6' style = "text-align:-webkit-center;padding-top:5%;height:550px;background-color:#EFEDEE">
        @endif

                <div>

                    <h2 style = "font-family:'Raleway'">{{$project->name}}</h2>
                    <h5>{{$project->status}}</h5>

                    <h4>Difficulty Level</h4>
                    <h5>{{$project->difficulty}}</h5>

                    <h4>Development Skills</h4>


                    {{--<div class = "row" >--}}


                        {{--@foreach($skills as $project->description){--}}
                        {{--<img src="{{asset($skill)}}">--}}
                        {{--}--}}

                        {{--@endforeach--}}

                    {{--</div>--}}

                    <h3 style="font-family:'Raleway';font-weight:100">Sponsed by:</h3>


                    <a href ="{!! URL::route('question',$project->id) !!}" style= "display:table-caption;border:solid 1px ;">START PROJECT</a>
                </div>
            </div>


