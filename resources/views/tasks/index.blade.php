@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('tasks.create')}}">
            <button class="btn btn-success mb-2">Creat new task</button>
        </a>

        <div class="card-deck d-flex justify-content-around mb-3">
            @foreach($tasks as $task)
                <div class="card col-md-4 p-0 mb-3">
                    <div class="card-header">
                        <img style="max-height: 30px" src="{{$task->project->logo_url}}">
                        {{$task->project->name}}
                    </div>
                    <div class="card-body">
                        <strong>{{str_limit($task->title, $limit = 200, $end = '...')}}</strong>
                    </div>
                    <div class="card-body">
                        <a href="tasks/{{$task->id}}">Placiau</a>
                    </div>
                    <div class="card-footer">
                        <span>
                            Created by: {{$task->user->name}}
                        </span>

                        @if($task->status->id == 3)
                            <span class="ml-auto text-success">
                                {{$task->status->name}}
                            </span>
                        @else
                            <span class="float-right text-danger">
                                {{$task->status->name}}
                            </span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection