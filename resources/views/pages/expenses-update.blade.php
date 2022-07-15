@extends('layouts.app')

@section('content')
<div class="header bg-gradient-success pb-8 pt-5 pt-md-8">
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="card-title text-uppercase mb-0">Update Expenses</h3>
                </div>
                <div class="card-body">
                    {!! Form::open(['action' => ['App\Http\Controllers\ExpensesController@update', $expensesId], 'method' => 'POST']) !!}
                    @csrf
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-credit-card"></i></span>
                                </div>
                                <select class="form-control" name="expense_category" required>
                                    <option selected readonly>Expenses Category</option>
                                    @if(count($userExpenses ?? '') > 0)
                                        @foreach($userExpenses ?? '' as $userExpense)
                                        <option>{{$userExpense->expense_category}}</option>
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
                                <input class="form-control" placeholder="{{ __('Amount') }}" type="number" name="amount" value="{{$userExpense->amount}}" required>
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
                            <button type="submit" class="btn btn-block bg-success text-white mb-2">{{ __('Update') }}</button>
                        </div>
                    {!! Form::close() !!}
                        {!! Form::open(['role' => 'form', 'action' => ['App\Http\Controllers\ExpensesController@destroy', $expensesId], 'method' => 'POST']) !!}
                        <button type="submit" class="btn btn-block bg-danger text-white mb-2">{{ __('Delete') }}</button>
                        {!! Form::close() !!}
                        <a type="submit" class="btn btn-block bg-primary text-white mb-2" href="/expenses">{{ __('Cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection