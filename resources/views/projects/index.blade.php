@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{route('projects.create')}}"><button class="btn btn-success">Creat new Project</button></a>
                <div class="container">
                    <div class="card-deck mb-3">
                        @foreach($projects as $project)
                            <div class="card mb-4" style="min-width: 220px">
                                <div class="card-header"><strong>{{$project->name}}</strong></div>

                                <div class="card-body">
                                    {{str_limit($project->description, $limit = 30, $end = '...')}}
                                </div>
                                <div class="card-body">
                                    <a href="projects/{{$project->id}}">Placiau</a>
                                </div>
                                <div class="card-footer">
                                @endforeach
                            </div>
                            {{ $projects->links() }}
                    </div>
                </div>
            </div>
        </div>
@endsection