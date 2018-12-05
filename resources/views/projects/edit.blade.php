@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>Edit Project</strong></div>
                    <div class="card-body">
                        <form action="{{ route('projects.update', $project->id) }}" method="POST">
                            @method('POST')
                            @csrf
                            <div class="form-group">
                                <input class="form-control" value="{{$project->name}}" type="text" name="name" placeholder="Name"/>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description" placeholder="Description">{{$project->description}}</textarea>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label>Start Date:</label> <input value="{{substr($project->created_at, 0, 10)}}" type="date" name="created_at">
                                </div>
                                <div class="col">
                                    <label>Last updated:</label> <input value="{{substr($project->updated_at, 0,10)}}" type="date" name="updated_at">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label>Owner:</label>
                                    <select name="project_owner_id">
                                        <option value="{{$project->client}}">{{$project->client->name . ' ' . $project->client->email}}</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label>Price:</label>
                                    <input type="number" name="hourly_rate" value="{{$project->hourly_rate}}" placeholder="Price"/>
                                </div>
                            </div>
                            <div class="form-row my-1">
                                <div class="col">
                                    <input class="form-control" type="url" name="url" value="{{$project->url}}" placeholder="Url"/>
                                </div>
                            </div>
                            <div class="form-row my-1">
                                <div class="col">
                                    <input class="form-control" type="url" name="admin_url" value="{{$project->admin_url}}" placeholder="Admin Url"/>
                                </div>
                            </div>
                            <div class="form-row my-1">
                                <div class="col">
                                    <input class="form-control" type="url" name="git_url" value="{{$project->git_url}}" placeholder="Git Url"/>
                                </div>
                            </div>
                            <div class="form-group my-1">
                                <textarea style="min-height: 100px" class="form-control" name="login_details" placeholder="Login details">{{$project->login_details}}</textarea>
                            </div>
                            <div class="form-row my-1">
                                <div class="col">
                                    <input class="form-control" type="url" name="logo_url" value="{{$project->logo_url}}" placeholder="Logo Url"/>
                                </div>
                            </div>
                            <div class="form-row my-1">
                                <div class="col">
                                    <input class="form-control" type="text" name="system_type" value="{{$project->system_type}}" placeholder="Project System"/>
                                </div>
                            </div>
                            <br/>
                            <button class="btn btn-success">Update Project</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection