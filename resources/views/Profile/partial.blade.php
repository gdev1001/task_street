
<div class="col-md-12 photocover" >
    <h2 class ="title">{{$user->projects->first()->name}}</h2>
    <h3 class ="title">Current Project</h3>
    <img src="{{asset('img/progress.png')}}" style = "opacity:0.6;margin-top:2%">
    <h2 class = "title space">{{$user->user->name}}</h2>

    @if ($prevTask != [])
        <div class = "col-md-2 col-md-offset-2 module">
            <h3>Module: Sign in sign up</h3>
            <h6>Task Name: {{ $prevTask->name }}</h6>
            <h6>Project Name:{{ $prevTask->project->name }}</h6>
        </div>
    @else
        <div class = "col-md-2 col-md-offset-2 module">
            <h3>Module: Sign in sign up</h3>
            <h6>Task Name: </h6>
            <h6>Project Name: </h6>
        </div>
    @endif

    <div class="col-md-1 arrow">
        <h1 class ="large">- - -</h1>
    </div>

    <div class = "col-md-2 currentModule">
        <h3>Current Module</h3>
        <h6>Task Name: {{ $currentTask->name }}</h6>
        <h6>Project Name:{{ $currentTask->project->name }}</h6>
    </div>

    <div class="col-md-1 arrow">
        <h1 class ="large">- - -</h1>
    </div>
    @if ($nextTask != [])
        <div class = "col-md-2 module">
            <h3>Module: Sign in sign up </h3>
            <h6>Task Name: {{ $nextTask->name }}</h6>
            <h6>Project Name:{{ $nextTask->project->name }}</h6>
        </div>
    @else
        <div class = "col-md-2 module">
            <h3>Module: Sign in sign up </h3>
            <h6>Task Name: </h6>
            <h6>Project Name:</h6>
        </div>
    @endif

</div>

<div class = "col-md-12 space small-size">
    <div class = "col-md-4 col-md-offset-4 center">
        <a href = "{{url('/project',$user->projects->first()->id)}}"><button type="submit" class="btn button btn-default">Continue</button></a>
    </div>
</div>