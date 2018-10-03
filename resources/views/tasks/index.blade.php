@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{route('tasks.create')}}"><button class="btn btn-success">Creat new task</button></a>
                <div class="container">
                    <div class="card-deck mb-3">
                    @foreach($tasks as $task)
                        <div class="card mb-4" style="min-width: 220px">
                            <div class="card-header"><strong>{{$task->title}}</strong></div>

                            <div class="card-body">
                                {{str_limit($task->task_content, $limit = 30, $end = '...')}}
                            </div>
                            <div class="card-body">
                                <a href="tasks/{{$task->id}}">Placiau</a>
                            </div>
                            <div class="card-footer">
                                @if($task->status->id == 3)
                                <div class="col text-center text-success">
                                @else
                                <div class="col text-center text-danger">
                                @endif
                                    {{$task->status->name}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    {{ $tasks->links() }}
                    </div>
                </div>
        </div>
    </div>
@endsection