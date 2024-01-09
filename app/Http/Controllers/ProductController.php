<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderBy('id', 'asc')->paginate(3);
        return view('backend.admin.product.index', compact('products'));
    }

    public function create(){
        $categories = Category::all();
        return view('backend.admin.product.create', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required',
            'quantity' => 'required',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required',
            'category_id' => 'required',
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

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $request->slug,
            'quantity' =>$request->quantity,
            'price' =>$request->price,
            'category_id' =>$request->category_id,
            'meta_title' => $request->meta_title,
            'meta_description'=>$request->meta_description,
            'discount_percent'=>(100 - $request->disprice),
            'image' => $profileImage,
        ]);
       // dd($product);
        return redirect('admin/product')->with('success', 'Product created successfully');
    }

    public function view($id){
        $product= Product::find($id);
        return view('backend.admin.product.view', compact('product'));
    }

    public function edit($id){
        $categories = Category::all();
        $product = Product::find($id);
        return view('backend.admin.product.edit', compact(['product', 'categories']));
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

        $product = Product::find($id);

        $cat = $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $request->slug,
            'image' => $profileImage,
        ]);
        // dd($cat);
         return redirect('admin/product')->with('success', 'Product updated successfully');
    }

    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        return redirect('admin/product')->with('success', 'Product deleted successfully');
    }
}
