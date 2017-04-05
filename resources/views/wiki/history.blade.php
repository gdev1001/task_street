@extends('wiki.app')
@section('contentPane')



    <div class="container-fluid">
        <div class="col-md-12">
            <h1>{{ isset($page->title) ? $page->title : 'This page doesn\'t exist!' }}
                @if(isset($page->id))
                    <span class="pull-right">
					@if(isset($can_create_page))
                            <a class="btn btn-success btn-xs" href="/{{$name}}/wiki/create"><i class="glyphicon glyphicon-plus"></i></a>
                        @endif
                        @if(isset($can_delete_page))
                            <a class="btn btn-danger btn-xs" href="/{{$name}}/wiki/{{ $page->id }}/delete"><i class="glyphicon glyphicon-remove"></i></a>
                        @endif
                        <a class="btn btn-warning btn-xs" href="/{{$name}}/wiki/{{ $page->id }}/refresh"><i class="glyphicon glyphicon-refresh"></i></a>
                        @if(isset($can_edit_page))
                            <a class="btn btn-primary btn-xs" href="/{{$name}}/wiki/{{ $page->id }}/edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                            <a class="btn btn-primary btn-xs" href="/{{$name}}/wiki/{{ $page['id'] }}/history"><i class="glyphicon glyphicon-list-alt"></i> History</a>
                        @endif
                        @if(isset($can_lock_page))
                            @if($page->lock === 1)
                                <a class="btn btn-primary btn-xs" href="/{{$name}}/wiki/{{ $page['id'] }}/sendNotification?action=unlock"><i class="glyphicon glyphicon-unlock-alt"></i> Unlock this page</a>
                            @elseif($page->lock === 0)
                                <a class="btn btn-primary btn-xs" href="/{{$name}}/wiki/{{ $page['id'] }}/sendNotification?action=lock"><i class="glyphicon glyphicon-lock-alt"></i> Lock this page</a>
                            @endif
                            <a class="btn btn-primary btn-xs" href="/{{$name}}/wiki/{{ $page['id'] }}/permissions"><i class="glyphicon glyphicon-list-alt"></i>Manage permissions</a>
                        @endif
				</span>
                @endif
            </h1>

            <div style = "height:350px;background-color:#eee;padding:3%;margin-top:5%">
                <p>
                    Documentation Menu
				<span class="pull-right">
					<a class="btn btn-success btn-xs" href={{url("/".$name."/wiki/create")}}><i class="glyphicon glyphicon-plus"></i></a>
				</span>
                </p>
                <hr style = "border-top:2px solid #EAE4E4;margin-top:10px">
                <h2>{{$title}}</h2>
                <ul>
                    @if(isset($revisions))
                    @foreach($revisions as $revision)
                        <li>
                            <strong>User</strong> {{$revision['user']}}    {{"DATE: ". $revision['timestamp']}} <a href="/{{$name}}/wiki/{{ $page['id'] }}/{{$revision['parentid']}}/{{$revision['revid']}}/rollback"> {{"Cancel"}}</a>
                            <br>
                        <div>
                                {{$revision['*']}}
                        </div>
                        </li>
                    @endforeach
                        @endif
                </ul>
            </div>

        </div>
    </div>


    <script>
        function goBack(){
            window.history.back();
        }
    </script>
@endsection