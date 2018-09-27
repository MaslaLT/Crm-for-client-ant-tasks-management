@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger">Delete task</button>
            </form>
            <form action="{{ route('tasks.edit', $task->id) }}" method="POST">
                @method('GET|HEAD')
                @csrf
                <button class="btn btn-warning">Edit task</button>
            </form>
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
                        {{$task->content}}
                    </div>
                    <hr>
                    <div class="d-flex flex-row justify-content-around">
                        <div class="d-flex flex-column">
                            <div class="card-body">
                                <b class="text-danger">Status_id = </b>
                                {{$task->status_id}}
                            </div>
                            <div class="card-body">
                                <b class="text-danger">Priority_id = </b>
                                {{$task->priority_id}}
                            </div>
                            <div class="card-body">
                                <b class="text-danger">Author_id = </b>
                                {{$task->author_id}}
                            </div>
                            <div class="card-body">
                                <b class="text-danger">Client_id = </b>
                                {{$task->client_id}}
                            </div>
                            <div class="card-body"><b class="text-danger">Project_id = </b>
                                {{$task->project_id}}
                            </div>
                            <div class="card-body"><b class="text-danger">Estimated_time = </b>
                                {{$task->estimated_time}} min
                            </div>
                            <div class="card-body"><b class="text-danger">Spent_time = </b>
                                {{$task->spent_time}} min
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="card-body"><b class="text-danger">Billing_time = </b>
                                {{$task->billing_time}}
                            </div>
                            <div class="card-body"><b class="text-danger">Start_Date :  </b>
                                {{$task->start_date}}
                            </div>
                            <div class="card-body"><b class="text-danger">Deadline_date : </b>
                                {{$task->deadline_date}}
                            </div>
                            <div class="card-body"><b class="text-danger">Fixed_rate = </b>
                                {{$task->fixed_rate}} eur
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection