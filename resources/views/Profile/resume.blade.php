<div class="col-md-12 data-container">

    <div class = "col-md-6 small-size">
        <div class = "col-md-12 space">
            <h4 class = "title">ABOUT ME</h4>
            {!! Form::open(array(null,null))!!}
            <input type="hidden" id = 'what' name="about" value="">
            <section id = "editable" contenteditable="true">
                <p id = "test">{{$resume->about}}</p>
            </section>
            {!! Form::submit('Save',["class"=>'btn btn-success','onclick'=>'setValue(this);return false;']) !!}
            {!! Form::close() !!}

        </div>


        <div class = "col-md-12 small-size" style="position:relative;">
            <h4 class = "title"> SKILL SET</h4>
            <canvas width='500' height="180" id="c1"></canvas>
            <canvas id="tip" width=100 height=25></canvas>
        </div>

        <div class = "col-md-12 small-size">
            <h4 class = "title">EDUCATION&EXPERIENCE</h4>

            <div class = "col-md-6 center">
                <h5 class = "space">Individual Project</h5>


                @foreach ($achievements as $key => $achievement)
                    <div class = "box left">
                        <h4>Rank:{{ $key+1 }}</h4>
                        <h5>{{$achievement->tasks->project->name}}</h5>
                        <h6>Model: {{ $achievement->tasks->name }}</h6>
                        <h6>Total Point Gained: {{$achievement->overall_point}}</h6>
                        <h6>Contributed Fields:</h6>
                    </div>
                @endforeach
            </div>

            <div class = "col-md-6 center">
                <h5>Group Project</h5>
                @foreach ($achievements as $key => $achievement)
                    <div class="box left">
                        <h4>Rank:{{ $key+1}}</h4>
                        <h6>Rank:{{ $achievement->tasks->name }}</h6>
                        <h6>Total Point Gained: {{ $achievement->overall_point }}</h6>
                        <h6>Contributed Fields:</h6>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    <div class = "col-md-6 ">
        <div class = "col-md-12 space">
            <h4 class = "title">TALENT ANALYSIS</h4>
            <div id="main">
                <div id="sequence"></div>
                <div id="chart">
                    <div id="explanation" style="visibility: hidden;">
                        <span id="percentage"></span><br/>
                        of visits begin with this sequence of pages
                    </div>
                </div>
            </div>
            <div id="sidebar">
                <input type="checkbox" id="togglelegend"> Legend<br/>
                <div id="legend" style="visibility: hidden;"></div>
            </div>
            <script type="text/javascript" src={{asset('js/sequences.js')}}></script>
            <script type="text/javascript">
                // Hack to make this example display correctly in an iframe on bl.ocks.org
                d3.select(self.frameElement).style("height", "350px");
            </script>
        </div>
    </div><!--Close of col!-->
    <div class = "col-md-6 space">
        <h4>Profile Viewed By</h4>
        <h5>Company Name</h5>
    </div>
</div>

</div><!--Close of Row!-->