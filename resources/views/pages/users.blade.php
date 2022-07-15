@extends('layouts.app')

@section('content')
<div class="header bg-gradient-success pb-8 pt-5 pt-md-8">
    <div class="container">
        @include('layouts.inc.messages')
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Role</th>
                        <th scope="col">Created at</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($users ?? '') > 0)
                        @foreach($users ?? '' as $user)
                            <tr class="text-white">
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="mb-0 text-sm">{{$user->name}}</span>
                                        </div>
                                    </div>
                                </th>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>
                                    {{$user->role}}
                                </td>
                                <td>
                                    {{date('m-d-Y', strtotime($user->created_at))}}
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        @if($user->role == 'Administrator')
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item">Administrator Role cannot be updated/deleted</a>
                                            </div>
                                        @else
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="/users/edit/{{$user->id}}">Edit User</a>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="text-white">
                            <th scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="mb-0 text-sm">No User Found.</span>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div>
            <a class="btn btn-link btn-primary bg-primary text-white mt-4 mb-0" href="/users/add">Add User</a>
        </div>
    </div>
</div>
@endsection