@extends('layouts.app')

@section('content')
<div class="header bg-gradient-success pb-8 pt-5 pt-md-8">
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="card-title text-uppercase mb-0">Add Expenses</h3>
                </div>
                <div class="card-body">
                    {!! Form::open(['action' => 'App\Http\Controllers\ExpensesController@store', 'method' => 'POST']) !!}
                    @csrf
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-credit-card"></i></span>
                                </div>
                                <select class="form-control" name="expense_category" required>
                                    <option selected readonly>Expenses Category</option>
                                    @if(count($categories ?? '') > 0)
                                        @foreach($categories ?? '' as $category)
                                        <option value="<?php echo $category->display_name; ?>">{{$category->display_name}}</option>
                                        @endforeach
                                    @else
                                        <option>No Category Found.</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-money-coins"></i></span>
                                </div>
                                <input class="form-control" placeholder="{{ __('Amount') }}" type="number" name="amount" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input class="form-control" placeholder="{{ __('Entry Date') }}" type="date" name="date" required>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-block bg-primary text-white mb-2">{{ __('Save') }}</button>
                        </div>
                        <div class="text-center">
                            <a type="submit" class="btn btn-block btn-link bg-danger text-white" href="/expenses">{{ __('Cancel') }}</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection