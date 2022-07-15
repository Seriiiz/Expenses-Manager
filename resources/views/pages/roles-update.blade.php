@extends('layouts.app')

@section('content')
<div class="header bg-gradient-success pb-8 pt-5 pt-md-8">
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="card-title text-uppercase mb-0">Update Role</h3>
                </div>
                <div class="card-body">
                    {!! Form::open(['role' => 'form', 'action' => ['App\Http\Controllers\UserManagementController@role_update', $role_id], 'method' => 'POST']) !!}
                    @csrf
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                </div>
                                <input class="form-control" placeholder="{{ __('Display Name') }}" type="text" name="display_name" value="{{$display_name}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-tag"></i></span>
                                </div>
                                <textarea class="form-control" placeholder="{{ __('Description') }}" type="text-area" name="description" required>{{$role}}</textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-block bg-success text-white mb-2">{{ __('Update') }}</button>
                        </div>
                    {!! Form::close() !!}
                        {!! Form::open(['role' => 'form', 'action' => ['App\Http\Controllers\UserManagementController@role_destroy', $role_id], 'method' => 'POST']) !!}
                            <button type="submit" class="btn btn-block bg-danger text-white mb-2">{{ __('Delete') }}</button>
                        {!! Form::close() !!}
                        <a type="submit" class="btn btn-block bg-primary text-white mb-2" href="/roles">{{ __('Cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection