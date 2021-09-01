<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     */
    public function store(Request $request)
    {
        return Category::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  Category  $category
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Category  $category
     */
    public function update(Request $request, Category $category)
    {
        $category->fill($request->all())->save();
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category  $category
     */
    public function destroy(Category $category)
    {
        return $category->delete();
    }
}
