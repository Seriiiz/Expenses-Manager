@extends('layouts.app')

@section('content')
<div class="header bg-gradient-success pb-8 pt-5 pt-md-8">
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="card-title text-uppercase mb-0">Add Role</h3>
                </div>
                <div class="card-body">
                    {!! Form::open(['action' => 'App\Http\Controllers\UserManagementController@role_store', 'method' => 'POST']) !!}
                    @csrf
                        <div class="form-group{{ $errors->has('display_name') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('display_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Display Name') }}" type="text" name="display_name" value="{{ old('display_name') }}" required>
                            </div>
                            @if ($errors->has('display_name'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('display_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-tag"></i></span>
                                </div>
                                <textarea class="form-control" placeholder="{{ __('Description') }}" type="text-area" name="description" required></textarea>
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