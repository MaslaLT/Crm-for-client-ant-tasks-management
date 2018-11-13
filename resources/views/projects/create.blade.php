@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>New Project</strong></div>
                    <div class="card-body">
                        <form action="{{ route('projects.store') }}" method="POST">
                            @method('POST')
                            @csrf
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" placeholder="Name"/>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description" placeholder="Description"></textarea>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label>Start Date:</label> <input value="{{date('Y-m-d')}}" type="date" name="created_at">
                                </div>
                                <div class="col">
                                    <label>Deadline:</label> <input value="{{date('Y-m-d')}}" type="date" name="updated_at">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label>Owner:</label>
                                    <select name="project_owner_id">
                                        @foreach($clients as $client)
                                            <option value="{{$client->id}}">{{$client->name . ' ' . $client->email}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label>Price:</label>
                                    <input type="number" name="hourly_rate" placeholder="Price"/>
                                </div>
                            </div>
                            <div class="form-row my-1">
                                <div class="col">
                                    <input class="form-control" type="url" name="url" placeholder="Url"/>
                                </div>
                            </div>
                            <div class="form-row my-1">
                                <div class="col">
                                    <input class="form-control" type="url" name="admin_url" placeholder="Admin Url"/>
                                </div>
                            </div>
                            <div class="form-row my-1">
                                <div class="col">
                                    <input class="form-control" type="url" name="git_url" placeholder="Git Url"/>
                                </div>
                            </div>
                            <div class="form-group my-1">
                                <textarea style="min-height: 100px" class="form-control" name="login_details" placeholder="Login details"></textarea>
                            </div>
                            <div class="form-row my-1">
                                <div class="col">
                                    <input class="form-control" type="url" name="logo_url" placeholder="Logo Url"/>
                                </div>
                            </div>
                            <div class="form-row my-1">
                                <div class="col">
                                    <input class="form-control" type="text" name="system_type" placeholder="Project System"/>
                                </div>
                            </div>
                            <br/>
                            <button class="btn btn-success">Create Project</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection