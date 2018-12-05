@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="justify-content-center">
            <div class="col-md-12">
                <div class="card shadow m-1 small">
                    <div class="card-header">
                        Users
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="p-1 p-md-3" scope="col">Id</th>
                                    <th class="p-1 p-md-3" scope="col">Name</th>
                                    <th class="p-1 p-md-3" scope="col">Email</th>
                                    <th class="p-1 p-md-3" scope="col">Role</th>
                                    <th class="p-1 p-md-3" scope="col">Direct Permissions</th>
                                    <th class="p-1 p-md-3" scope="col">Email Verfy Date</th>
                                    <th class="p-1 p-md-3" scope="col">Created</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="p-1 p-md-3" >{{$user->id}}</td>
                                    <td class="p-1 p-md-3" >{{$user->name}}</td>
                                    <td class="p-1 p-md-3" >{{$user->email}}</td>
                                    <td class="p-1 p-md-3" >{{$user->getRoleNames()}}</td>
                                    <td class="p-1 p-md-3" >{{$user->getDirectPermissions()}}</td>
                                    @if($user->email_verified_at === null)
                                        <td class="p-1 p-md-3" >Not Verified</td>
                                    @else
                                        <td class="p-1 p-md-3" >{{$user->email_verified_at}}</td>
                                    @endif
                                    <td class="p-1 p-md-3" >{{$user->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card shadow m-1 small">
                    <div class="card-header">
                        Roles Have Permissions
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="p-1 p-md-3" scope="col">Role</th>
                                    <th class="p-1 p-md-3" scope="col">Permissions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td class="p-1 p-md-3" >{{ucfirst($role->name)}}</td>
                                    <td class="p-1 p-md-3" >{{ucfirst($rolesHasPermissions)}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection