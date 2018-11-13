@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><strong>New Task</strong></div>
                        <div class="card-body">
                            <form action="{{ route('tasks.store') }}" method="POST">
                                @method('POST')
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" type="text" name="title" placeholder="Title"/>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="task_content" placeholder="Content"></textarea>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <label>Start Date:</label> <input type="date" name="start_date" value="{{date('Y-m-d')}}">
                                    </div>
                                    <div class="col">
                                        <label>Deadline:</label> <input type="date" name="dedline_date" value="{{date('Y-m-d')}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <input class="form-control" type="number" name="fixed_rate" placeholder="Rate in Eu"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control" type="number" name="estimated_time" placeholder="Estimated time in MINUTES"/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <label>Status</label>
                                        <select name="status">
                                            @foreach($statuses as $status)
                                                <option value="{{$status->id}}">{{$status->name}}</option>
                                            @endforeach
                                        </select>
                                        <label>Priority</label>
                                        <select name="priority">
                                            @foreach($priorities as $priority)
                                                <option value="{{$priority->id}}">{{$priority->name}}</option>
                                            @endforeach
                                        </select>
                                        <label>Project</label>
                                        <select name="project">
                                            @if(!empty($_GET['project']))
                                                {{$selectedId = $_GET['project']}}
                                                @foreach($projects as $project)
                                                    @if($project->id == $_GET['project'])
                                                        <option selected value="{{$project->id}}">{{$project->name}}</option>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach($projects as $project)
                                                    <option value="{{$project->id}}">{{$project->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <br/>
                            <button class="btn btn-success">Create Task</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection