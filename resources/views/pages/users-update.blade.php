@extends('layouts.app')

@section('content')
<div class="header bg-gradient-success pb-8 pt-5 pt-md-8">
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="card-title text-uppercase mb-0">Update User</h3>
                </div>
                <div class="card-body">
                    {!! Form::open(['role' => 'form', 'action' => ['App\Http\Controllers\UserManagementController@user_update', $user_id], 'method' => 'POST']) !!}
                    @csrf
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                </div>
                                <input class="form-control" placeholder="{{ __('Name') }}" type="text" name="name" value="{{$name}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input class="form-control" placeholder="{{ __('Email') }}" type="text" name="email" value="{{$email}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-tag"></i></span>
                                </div>
                                <select class="form-control" name="role" required>
                                    <option selected readonly>{{$currentRole}}</option>
                                    @if(count($roles ?? '') > 0)
                                        @foreach($roles ?? '' as $role)
                                        <option>{{$role->display_name}}</option>
                                        @endforeach
                                    @else
                                        <option>No Role Found.</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-block bg-success text-white mb-2">{{ __('Update') }}</button>
                        </div>
                    {!! Form::close() !!}
                        {!! Form::open(['role' => 'form', 'action' => ['App\Http\Controllers\UserManagementController@user_destroy', $user_id], 'method' => 'POST']) !!}
                            <button type="submit" class="btn btn-block bg-danger text-white mb-2">{{ __('Delete') }}</button>
                        {!! Form::close() !!}
                        <a type="submit" class="btn btn-block bg-primary text-white mb-2" href="/users">{{ __('Cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection