<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $categories = Category::orderBy('name', 'asc')->paginate(3);
        return view('backend.admin.category.index', compact('categories'));
    }

    public function create(){
        return view('backend.admin.create');
    }
}
