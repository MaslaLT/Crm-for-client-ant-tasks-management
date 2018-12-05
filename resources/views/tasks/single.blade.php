@extends('layouts.app')

@section('content')
    <div role="main" class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">

                            <div>
                                <b class="text-danger">Title:</b>
                                <span>
                                    {{$task->title}}
                                </span>
                            </div>

                            <div class="d-flex">
                                <div class="mx-1">
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="collapse"
                                            data-target="#delete_collapse" aria-expanded="false" aria-controls="dataTargetCollapse">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                                <div>
                                    @can('edit task')
                                    <a href="{{route('tasks.edit', $task->id)}}">
                                        <button class="btn btn-sm btn-outline-warning">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        @can('delete task')
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <div class="collapse mt-1" id="delete_collapse" style="">
                                    <div class="alert alert-danger small">
                                        You realy want to delete: TASK?
                                        <div>
                                            <button class="btn btn-danger mt-1" type="submit">Delete</button>
                                            <div class="btn btn-success mt-1" data-toggle="collapse" data-target="#delete_collapse">No</div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endcan
                    </div>

                    <div class="card-body">
                        <b class="text-danger">Content:</b>
                        <br>
                            {!!trim($task->task_content, '"')!!}
                    </div>

                    <div class="card-footer px-1 py-2">
                        <div class="container-fluid">
                            <div class="row small">
                                <div class="col">
                                    <b>Started</b>
                                    {{substr(ucfirst($task->start_date), 0, 10)}}
                                </div>
                                <div class="col">
                                    <b>Deadline</b>
                                    {{substr(ucfirst($task->deadline_date), 0, 10)}}
                                </div>
                                <div class="col">
                                    <b>Billing time</b>
                                    {{ucfirst($task->billing_time)}}
                                </div>
                            </div>

                            <div class="row small">
                                <div class="col">
                                    <b>Status </b>
                                    {{ucfirst($task->status->name)}}
                                </div>
                                <div class="col">
                                    <b>Priority </b>
                                    {{ucfirst($task->priority->name)}}
                                </div>
                                <div class="col">
                                    <b>Created by </b>
                                    {{ucfirst($task->user->name)}}
                                </div>
                            </div>

                            <div class="row small">
                                <div class="col">
                                    <b>Time to complete </b>
                                    {{ucfirst($task->estimated_time)}}
                                </div>
                                <div class="col">
                                    <b>Time spent </b>
                                    {{ucfirst($task->spent_time)}}
                                </div>
                                <div class="col">
                                    <b>Rate</b>
                                    {{ucfirst($task->fixed_rate . '$')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 p-2">
                <h6 class="lead pb-2 mb-0 mt-2">Comments</h6>
                @foreach($task->comments as $comment)
                    @if($comment->active = 1)
                        <div class="d-flex mt-1 justify-content-between border-top border-gray">
                            <div>
                                <i class="fas fa-user"></i>
                                <strong class="text-muted text-gray-dark">{{$task->user->name}}</strong>
                            </div>
                            @if(Auth::id() == $comment->author_id ||Auth::id == Auth::user()->hasRole('administrator'))
                                <div>
                                    <i id="editComentButton" class="text-secondary far fa-edit"></i>
                                    <i id="deleteComentButton" class="text-secondary far fa-trash-alt"></i>
                                </div>
                            @endif
                        </div>
                        <div class="pt-3 mb-4">
                            <p class="pb-1 mb-0 small lh-125">
                                {!! trim($comment->content, ' ') !!}
                            </p>
                            <div class="small">
                                <div class="text-right">
                                    {{$comment->created_at}}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                <button type="button" class="btn btn-outline-success mt-1" data-toggle="collapse"
                        data-target="#dataTargetCollapse" aria-expanded="false" aria-controls="dataTargetCollapse">
                    New comment
                </button>

                <div class="collapse" id="dataTargetCollapse">
                    <div class="alert alert-success">
                        <form class="form-group" action="{{route('comments.store')}}" method="POST">
                            @method('POST')
                            @csrf
                            <textarea class="form-control col-12" id="ContentSummernote"
                                      name="comment_content" placeholder="Type in your comment"></textarea>
                            <input type="hidden" name="task_id" value="{{$task->id}}">
                            <button class="btn btn-info"  type="submit">Post Comment</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#deleteComentButton").on("click", function(){
                alert("Hello");
            });
        });
    </script>

@endsection