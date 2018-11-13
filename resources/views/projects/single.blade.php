@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('projects.destroy', $projects->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger">Delete project</button>
            </form>
            <a href="{{route('projects.edit', $projects->id)}}"><button class="btn btn-warning">Edit project</button></a>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <image style="max-height: 50px" src="{{$projects->logo_url}}">
                        <b class="text-danger">Name</b>
                        <br>
                        {{$projects->name}}
                    </div>
                    <div class="card-body">
                        <b class="text-danger">Content:</b>
                        <br>
                        {{$projects->description}}
                    </div>
                    <div class="card-footer">
                        <b class="text-danger">Tasks</b>
                        @foreach($projects->tasks as $task)
                                <div class="card my-1">
                                    <a href="../tasks/{{$task->id}}"> {{$task->title}} </a>
                                    <br> Staus: {{$task->status->name}}
                                    <br> Priority: {{$task->priority->name}}
                                </div>
                        @endforeach
                    </div>
                    <a href="../tasks/create?project={{$projects->id}}" class="btn btn-info mx-2">Add New Task</a>
                    <div class="card-body">
                        <b class="text-danger">Urls:</b>
                        <div><a href="{{$projects->url}}">{{$projects->url}}</a></div>
                        <div><a href="{{$projects->admin_url}}">{{$projects->admin_url}}</a></div>
                        <div><a href="{{$projects->git_url}}">{{$projects->git_url}}</a></div>
                        <br>
                        <b class="text-danger">Login Details:</b>
                        <div>{{$projects->login_details}}</div>
                        <br>
                        <b class="text-danger">System:</b>
                        <div>{{$projects->system_type}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection