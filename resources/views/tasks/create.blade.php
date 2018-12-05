@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong>New Task</strong>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('tasks.store') }}" method="POST">
                            @method('POST')
                            @csrf

                            <div class="form-group">
                                <label for="ProjectFormInput">Project</label>
                                <select name="project" class="form-control form-control-sm"
                                        id="ProjectFormInput">
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

                            <div class="form-group">
                                <label for="TitleFormInput">Title</label>
                                <input type="text" class="form-control form-control-sm"
                                       id="TitleFormInput" name="title" placeholder="Title">
                            </div>

                            <div class="form-group">
                                <label for="ContentSummernote">Content</label>
                                <textarea type="text" class="form-control form-control-sm" rows="5" id="ContentSummernote"
                                          placeholder="Content" name="task_content">
                            </textarea>
                            </div>

                            <div class="form-group row">
                                <label for="StartDateInput" class="col-sm-2 col-form-label">Start Date</label>
                                <div class="col-sm-4">
                                    <input type="date" value="{{date('Y-m-d')}}"
                                           class="form-control form-control-sm" id="StartDateInput" name="start_date" placeholder="Start Date">
                                </div>

                                <div class="col-sm-1">
                                </div>

                                <label for="RateFormInput" class="col-sm-3 col-form-label">Hour Rate</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-sm"
                                           id="RateFormInput" placeholder="In EU" name="fixed_rate">
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="DeadlineDateInput" class="col-sm-2 col-form-label">Deadline</label>
                                <div class="col-sm-4">
                                    <input type="date" value="{{date('Y-m-d')}}"
                                           class="form-control form-control-sm" id="DeadlineDateInput" name="deadline_date" placeholder="Deadline">
                                </div>

                                <div class="col-sm-1">
                                </div>

                                <label for="EstimatedTimeFormInput" class="col-sm-3 col-form-label">Estimated Time</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-sm"
                                           id="EstimatedTimeFormInput" name="estimated_time" placeholder="Minutes">
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="StatusFormInput" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-2">
                                    <select class="form-control-sm" id="StatusFormInput" name="status">
                                        @foreach($statuses as $status)
                                            <option
                                                value="{{$status->id}}">{{$status->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                </div>

                                <label for="PriorityFormInput" class="col-sm-3 col-form-label">Priority</label>
                                <div class="col-sm-2">
                                    <select class="form-control-sm" id="PriorityFormInput" name="priority">
                                        @foreach($priorities as $priority)
                                            <option
                                                @if($priority->name == 'medium')
                                                    selected
                                                @endif
                                                value="{{$priority->id}}">{{ucfirst($priority->name)}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <button class="form-control btn-success btn">Create Task</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection