@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{route('tasks.create')}}"><button class="btn btn-success">Creat new task</button></a>
                @foreach($tasks as $task)
                    <div class="card">
                        <div class="card-header"><strong>{{$task->title}}</strong></div>

                        <div class="card-body">
                            {{$task->content}}
                        </div>
                        <div class="card-footer">
                            <a href="tasks/{{$task->id}}">Placiau</a>
                        </div>
                    </div>
                @endforeach

                {{ $tasks->links() }}
            </div>
        </div>
    </div>
@endsection