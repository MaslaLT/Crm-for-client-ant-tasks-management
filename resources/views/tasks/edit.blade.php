@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>Update Task</strong></div>
                    <div class="card-body">
                        <form action="{{ route("tasks.update", $task->id) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label for="TitleFormInput">Title</label>
                                <input type="text" value="{{$task->title}}"
                                       class="form-control form-control-sm" id="TitleFormInput" name="title" placeholder="Title">
                            </div>

                            <div class="form-group">
                                <label for="ContentSummernote">Content</label>
                                <textarea type="text" class="form-control form-control-sm" rows="5" id="ContentSummernote"
                                          placeholder="Content" name="task_content">{{$task->task_content}}
                                </textarea>
                            </div>

                            <div class="form-group row">
                                <label for="StartDateInput" class="col-sm-2 col-form-label">Start Date</label>
                                <div class="col-sm-4">
                                    <input type="date" value="{{date('Y-m-d', strtotime($task->start_date))}}"
                                           class="form-control form-control-sm" id="StartDateInput" name="start_date" placeholder="Start Date">
                                </div>

                                <div class="col-sm-1">
                                </div>

                                <label for="BillingTimeSpentFormInput" class="col-sm-3 col-form-label">Billing Time</label>
                                <div class="col-sm-2">
                                    <input type="number" value="{{$task->billing_time}}" class="form-control form-control-sm"
                                           id="BilingTimeSpentFormInput" name="billing_time" placeholder="Minutes">
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="DeadlineDateInput" class="col-sm-2 col-form-label">Deadline</label>
                                <div class="col-sm-4">
                                    <input type="date" value="{{date('Y-m-d', strtotime($task->deadline_date))}}"
                                           class="form-control form-control-sm" id="DeadlineDateInput" name="deadline_date"
                                           placeholder="Deadline">
                                </div>

                                <div class="col-sm-1">
                                </div>

                                <label for="TimeSpentFormInput" class="col-sm-3 col-form-label">Time Spent</label>
                                <div class="col-sm-2">
                                    <input type="number" value="{{$task->estimated_time}}" class="form-control form-control-sm"
                                           id="TimeSpentFormInput" name="spent_time" placeholder="Minutes">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="RateFormInput" class="col-sm-4 col-form-label">Hour Rate</label>
                                <div class="col-sm-2">
                                    <input type="number" value="{{$task->fixed_rate}}" class="form-control form-control-sm"
                                           id="RateFormInput" placeholder="In EU" name="fixed_rate">
                                </div>

                                <div class="col-1">
                                </div>

                                <label for="EstimatedTimeFormInput" class="col-sm-3 col-form-label">Estimated Time</label>
                                <div class="col-sm-2">
                                    <input type="number" value="{{$task->estimated_time}}" class="form-control form-control-sm"
                                           id="EstimatedTimeFormInput" name="estimated_time" placeholder="Minutes">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="StatusFormInput" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-2">
                                        <select class="form-control-sm" id="StatusFormInput" name="status">
                                            @foreach($statuses as $status)
                                                <option
                                                @if($status->id == $task->status->id) selected
                                                @endif
                                                value="{{$status->id}}">{{$status->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                </div>

                                <div class="col-sm-1">
                                </div>

                                <label for="PriorityFormInput" class="col-sm-2 col-form-label">Priority</label>
                                <div class="col-sm-2">
                                    <select class="form-control-sm" id="PriorityFormInput" name="priority">
                                        @foreach($priorities as $priority)
                                            <option
                                            @if($priority->id == $task->priority->id) selected
                                            @endif
                                            value="{{$priority->id}}">{{$priority->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-">
                                </div>

                                <div class="col-sm-3">
                                    <button class="form-control btn-info">Update Task</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection