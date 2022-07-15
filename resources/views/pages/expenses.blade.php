@extends('layouts.app')

@section('content')
<div class="header bg-gradient-success pb-8 pt-5 pt-md-8">
    <div class="container">
        @include('layouts.inc.messages')
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Expense Category</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Entry Date</th>
                        <th scope="col">Created at</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($expenses ?? '') > 0)
                        @foreach($expenses ?? '' as $expense)
                            <tr class="text-white">
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="mb-0 text-sm">{{$expense->expense_category}}</span>
                                        </div>
                                    </div>
                                </th>
                                <td>
                                    {{$expense->amount}}
                                </td>
                                <td>
                                    {{$expense->entry_date}}
                                </td>
                                <td>
                                    {{date('m-d-Y', strtotime($expense->created_at))}}
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="/expenses/edit/{{$expense->id}}">Edit Expenses</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="text-white">
                            <th scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="mb-0 text-sm">No Expenses Found.</span>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div>
            <a class="btn btn-link btn-primary bg-primary text-white mt-4 mb-0" href="/add/expenses">Add Expenses</a>
        </div>
    </div>
</div>
@endsection