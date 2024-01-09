<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('name', 'asc')->paginate(3);
        return view('backend.admin.category.index', compact('categories'));
    }

    public function create(){
        return view('backend.admin.category.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => ['required', 'string'],
            'slug' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //for image
        if ($image = $request->file('image')) {
            $destinationPath = 'images/backend/categories';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $request['image'] = "$profileImage";
        }
        // image ends here

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $request->slug,
            'image' => $profileImage,
        ]);
       // dd($user);
        return redirect('admin/category')->with('success', 'Category created successfully');
    }

    public function view($id){
        $category = Category::find($id);
        return view('backend.admin.category.view', compact('category'));
    }

    public function edit($id){
        $category = Category::find($id);
        return view('backend.admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $request->validate([
        'name' => 'required|string|max:255',
        'description' => ['required', 'string'],
        'slug' => 'required|string|max:255',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    //for image
    if ($image = $request->file('image')) {
        $destinationPath = 'images/backend/categories';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $request['image'] = "$profileImage";
    }
    // image ends here

        $category = Category::find($id);

        $cat = $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $request->slug,
            'image' => $profileImage,
        ]);
        // dd($cat);
         return redirect('admin/category')->with('success', 'Category updated successfully');
    }

    public function destroy($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('admin/category')->with('success', 'Category updated successfully');
    }
}
