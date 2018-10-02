@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>New Task</strong></div>
                    <div class="card-body">
                        <form action="{{ route("tasks.update", $task->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <input class="form-control" type="text" name="title" value="{{$task->title}}" placeholder="Title"/>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="task_content"  placeholder="Content">{{$task->task_content}}</textarea>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label>Start Date:</label> <input type="date" value="<?php echo date('Y-m-d', strtotime($task->start_date)); ?>" name="start_date">
                                </div>
                                <div class="col">
                                    <label>Deadline:</label> <input type="date" value="<?php echo date('Y-m-d', strtotime($task->deadline_date)); ?>" name="dedline_date"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <input class="form-control" type="number" name="fixed_rate" value="{{$task->fixed_rate}}" placeholder="Rate"/>
                                </div>
                                <div class="col">
                                    <input class="form-control" type="number" name="estimated_time" value="{{$task->estimated_time}}" placeholder="Estimated time"/>
                                </div>
                            </div>
                            <br/>
                            <select name="status">
                                @foreach($statuses as $status)
                                    <option
                                    @if($status->id == $task->status->id) selected @endif
                                    value="{{$status->id}}">{{$status->name}}
                                    </option>
                                @endforeach
                            </select>
                            <button class="btn btn-info">Update Task</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection