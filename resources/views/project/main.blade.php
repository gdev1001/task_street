@extends('app')

@section('addheader')
    <link href="{{ asset('css/projectlist.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Emilys+Candy' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:200,300' rel='stylesheet' type='text/css'>

@endsection

@section('content')
    <div class = 'container-fuild'>

        <div class= 'row'>

            {{-- */$i=1/* --}}


        @foreach($projects as $project)


                @include('project.show',[$project])

                {{-- */$i+=1/* --}}


            @endforeach



        </div>   <!-- close of row -->
    </div>  <!-- close of container -->

@endsection