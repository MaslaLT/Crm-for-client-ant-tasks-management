@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('projects.destroy', $projects->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger">Delete project</button>
            </form>
            <a href="{{route('projects.edit', $projects->id)}}"><button class="btn btn-warning">Edit project</button></a>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <b class="text-danger">Name</b>
                        <br>
                        {{$projects->name}}
                    </div>
                    <div class="card-body">
                        <b class="text-danger">Content:</b>
                        <br>
                        {{$projects->description}}
                    </div>
                    <hr>
                    <div class="d-flex flex-row justify-content-around">
                        <div class="d-flex flex-column">
                            <div class="card-body">
                                <b class="text-danger">Started = </b>
                                {{$projects->created_at}}
                            </div>
                            <div class="card-body">
                                <b class="text-danger">Last updated = </b>
                                {{$projects->updated_at}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection