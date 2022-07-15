<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Role;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        return view('pages.categories')->with('categories', $categories);
    }

    public function add_category()
    {
        return view('pages.categories-add');
    }

    public function update_category($id)
    {
        $category_id = $id;
        $editCategories = Category::all()->where('id', $id);
        foreach($editCategories ?? '' as $editCategory){
            $display_name = $editCategory->display_name;
            $role = $editCategory->description;
        }
        return view('pages.categories-update')->with('display_name', $display_name)->with('role', $role)->with('category_id', $category_id);
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
        $this->validate($request, [
            'display_name' => ['required', 'string', 'unique:categories'],
        ]);
        $category = $request->input('display_name');
        $description = $request->input('description');

        $categories = new Category;
        $categories->display_name = $category;
        $categories->description = $description;
        $categories->save();
        return redirect('/categories')->with('success', 'New category added on the list');
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
        $category = $request->input('display_name');
        $description = $request->input('description');     

        $updateCategory = Category::find($id);
        $updateCategory->display_name = $category;
        $updateCategory->description = $description;
        $updateCategory->save();
        return redirect('/categories')->with('success', 'Category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyCategory = Category::find($id);
        $destroyCategory->delete();
        return redirect('/categories')->with('success', 'Category deleted on the list.');
    }
}
