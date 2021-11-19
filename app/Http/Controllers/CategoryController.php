<?php

namespace App\Http\Controllers;

use view;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();     //select * from Category table
        return view ('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view ('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // category::create($request->all());
        //Validation
        Validator::make($request->all(),[
            'name'=>'required|unique:categories,name|regex:/^[a-zA-Z ]+$/'
            ], [
            'name.required'=>'Category name is required',
            'name.unique:categories,name'=>'Category name has already been token',
            'name.regex:/^[a-zA-Z ]+$/'=>'Category name must be text'
            ])->validate();

        //Create (Storing data from form to the table in database)
            Category::create([
                'name'=>$request->name,
                'slug'=>Str::slug($request->name)
            ]);

        //Return With Message
        return redirect()->route('admin.categories.index')
        ->with('msg', 'Category added successfully')
        ->with('type', 'success');
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
        $categories = Category::findOrFail($id);
        return view ('admin.categories.edit', compact('categories'));
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
        $categories = Category::findOrFail($id);
        // $categories = update($request->except('_token', 'image'));

        // $request->validate([
        //     'name'=>'required|string|unique:categories,name'
        // ]);
        Validator::make($request->all(),[
            'name'=>'required|unique:categories,name'
            ], [
            'name.required'=>'Category name is required',
            'name.unique:categories,name'=>'Category name has already been token',
            // 'name.regex:/^[a-zA-Z ]+$/'=>'Category name must be text'
            ])->validate();
            $categories->update($request->except('_token', 'image'));
            return redirect()->route('admin.categories.index')
            ->with('msg', 'Categoy Edited Successfully')
            ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);;
        $category->delete();
        return  redirect()->route('admin.categories.index')
        ->with('msg', 'Categories deleted Successfully')
        ->with('type', 'danger');
    }

    public function delete_all()
    {
        Category::truncate();
        return  redirect()->route('admin.categories.index')
        ->with('msg', 'All Categories Deleted')
        ->with('type', 'danger');
    }
}
