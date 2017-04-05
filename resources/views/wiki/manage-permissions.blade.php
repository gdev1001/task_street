@extends('wiki.app')
@section('contentPane')
    <div class="container-fluid">
        <div class="col-md-12">

            <div style = "height:350px;background-color:#eee;padding:3%;margin-top:5%">
                <h1>
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
                    Permissions</h1>
                <h2>{{$title}}</h2>
                @if(isset($message)) {{$message}} @endif
                <form method="POST" action="/{{$name}}/wiki/{{ $page->id }}/permissions">
                <input type="text" name="username" value="" placeholder="username...">
                <input type="hidden" name="owner" value="1">
                <button type="submit">Add owner</button>
                    {{csrf_field()}}
                </form>
                <br>
                <form method="POST" action="/{{$name}}/wiki/{{ $page->id }}/permissions">
                    <input type="text" name="username" value="" placeholder="username...">
                    <input type="hidden" name="editor" value="1">
                    <button type="submit">Add editor</button>
                    {{csrf_field()}}
                </form>
                <br>
                <form method="POST" action="/{{$name}}/wiki/{{ $page->id }}/permissions">
                    <input type="text" name="username" value="" placeholder="username...">
                    <input type="hidden" name="viewer" value="1">
                    <button type="submit">Add viewer</button>
                    {{csrf_field()}}
                </form>
                <br>
                <form method="POST" action="/{{$name}}/wiki/{{ $page->id }}/permissions">
                    <input type="text" name="username" value="" placeholder="username...">
                    <input type="hidden" name="delete" value="1">
                    <button type="submit">Delete permission</button>
                    {{csrf_field()}}
                </form>

                <br>
                <table style="width: 100%; border: 1px solid #000">
                    <tr>
                        <td>Owners</td>
                        <td>Editors</td>
                        <td>Viewers</td>
                    </tr>
                @foreach($users as $user)
                    <tr>
                        <td>@if($user->is_owner === 1) {{$user->name}}  @endif</td>
                        <td>@if($user->is_editor === 1) {{$user->name}}  @endif</td>
                        <td>@if($user->is_viewer === 1) {{$user->name}}  @endif</td>
                    </tr>
                @endforeach
                </table>
            </div>

        </div>
    </div>
@endsection