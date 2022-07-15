@extends('layouts.app')

@section('content')
<div class="header bg-gradient-success pb-8 pt-5 pt-md-8">
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="card-title text-uppercase mb-0">Add User</h3>
                </div>
                <div class="card-body">
                    {!! Form::open(['action' => 'App\Http\Controllers\UserManagementController@user_store', 'method' => 'POST']) !!}
                    @csrf
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                </div>
                                <input class="form-control" placeholder="{{ __('Name') }}" type="text" name="name" required>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email Address') }}" type="text" name="email" value="{{ old('email') }}" required>
                            </div>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-tag"></i></span>
                                </div>
                                <select class="form-control" name="role" required>
                                    <option selected readonly>Role</option>
                                    @if(count($roles ?? '') > 0)
                                        @foreach($roles ?? '' as $role)
                                        <option value="<?php echo $role->display_name; ?>">{{$role->display_name}}</option>
                                        @endforeach
                                    @else
                                        <option>No Role Found.</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-block bg-primary text-white mb-2">{{ __('Save') }}</button>
                        </div>
                        <div class="text-center">
                            <a type="submit" class="btn btn-block btn-link bg-danger text-white" href="/roles">{{ __('Cancel') }}</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection