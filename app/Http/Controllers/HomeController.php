<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Expense;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $categories = Category::all();
        return view('dashboard')->with('categories', $categories)->with('userId', $userId);
    }
}
