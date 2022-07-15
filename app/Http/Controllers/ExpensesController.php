<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Category;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $expenses = Expense::all()->where('user_id', $userId);
        return view('pages.expenses')->with('expenses', $expenses);
    }

    public function add_expenses()
    {
        $categories = Category::all();
        return view('pages.expenses-add')->with('categories', $categories);
    }

    public function update_expenses($id)
    {
        $expensesId = $id;
        $userExpenses = Expense::all()->where('id', $id);
        return view('pages.expenses-update')->with('userExpenses', $userExpenses)->with('expensesId', $expensesId);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        $expense_category = $request->input('expense_category');
        $amount = $request->input('amount');
        $entry_date = $request->input('date');

        $expenses = new Expense;
        $expenses->user_id = $userId;
        $expenses->expense_category = $expense_category;
        $expenses->amount = $amount;
        $expenses->entry_date = $entry_date;
        $expenses->save();
        return redirect('/expenses')->with('success', 'New category added on the list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $expense_category = $request->input('expense_category');
        $amount = $request->input('amount');     
        $entry_date = $request->input('date');    

        $updateExpense = Expense::find($id);
        $updateExpense->expense_category = $expense_category;
        $updateExpense->amount = $amount;
        $updateExpense->entry_date = $entry_date;
        $updateExpense->save();
        return redirect('/expenses')->with('success', 'Expenses updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyExpense = Expense::find($id);
        $destroyExpense->delete();
        return redirect('/expenses')->with('success', 'Expenses deleted on the list.');
    }
}
