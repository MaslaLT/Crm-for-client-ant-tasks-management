@extends('layouts.app')

@section('content')
    <div role="main" class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <b class="text-danger">Title</b>
                        <br>
                        {{$task->title}}
                    </div>
                    <div class="card-body">
                        <b class="text-danger">Content:</b>
                        <br>
                        {{$task->task_content}}
                    </div>
                    <hr>
                    <div class="d-flex flex-row justify-content-around">
                        <div class="d-flex flex-column">
                            <div class="card-body">
                                <b class="text-danger">Status = </b>
                                {{$task->status->name}}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex flex-row justify-content-around mb-2">
                    @can('delete task')
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Delete task</button>
                        </form>
                    @endcan
                    @can('edit task')
                    <a href="{{route('tasks.edit', $task->id)}}"><button class="btn btn-warning">Edit task</button></a>
                    @endcan
                    </div>
                </div>
            </div>
        </div>

        <div class="my-3 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0">Comments</h6>
            @foreach($task->comments as $comment)
                @if($comment->active = 1)
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <strong class="d-block text-gray-dark">{{$task->user->name}}</strong>
                            {{$comment->content}}
                        </p>
                        <div>
                            <a href="?EditComent={{$comment->id}}">EDIT</a>
                        </div>
                    </div>
                @endif
            @endforeach
            <small class="d-block text-right mt-3">
                <a href="#">All Commets</a>
            </small>
        </div>

        <hr>
        <div class="d-flex flex-column">
            <div class="card-body">
                <form class="form-group" action="{{route('comments.store')}}" method="POST">
                    @method('POST')
                    @csrf
                    <textarea class="form-control col-12" rows="5" name="comment_content" placeholder="Type in your comment"></textarea>
                    <input type="hidden" name="task_id" value="{{$task->id}}">
                    <button class="btn btn-info my-1"  type="submit">Post Comment</button>
                </form>
            </div>
        </div>
    </div>
@endsection