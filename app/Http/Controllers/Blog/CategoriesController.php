<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
    public function create()
    {
        return view('categories.category_create');
    }

    public function store()
    {
        Category::create(['name'=> request()->name]);

        return redirect("blog");
    }

}
