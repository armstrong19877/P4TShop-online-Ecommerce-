@extends('backend.layout.app')
@section('title', 'Create Product')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>P4TShop</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section> 

    <div class="col-md-6" style="width: 80%; height: 80%; align-item:center; text-align:center; justify-content:center; margin-left: 9rem;">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Product details</a></li>
              <li><a href="#tab_2" data-toggle="tab">Product meta details</a></li>
              <li><a href="#tab_3" data-toggle="tab">Product Image & Price</a></li>
            </ul>
        <div class="tab-content" style="width: 90%; height: 90%;">
            <div class="tab-pane active" id="tab_1" >
                <!-- form start -->
                <form role="form" action="{{url('admin/product/store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="box-body">

                    <div class="form-group" >
                        <label for="exampleInputPassword1">Product Name</label>
                        <input  type="text" name="name" class="form-control " style="height: 5rem; margin-left: 4rem;" id="exampleInputPassword1" placeholder="Enter product name">
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control select2"name="category_id"  style="width: 100%; height: 5rem; margin-left: 4rem;">
                            <option selected="selected" value="">Select Category</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1"> Product Description</label>
                        <textarea style="resize: none; width: 100%; height: 15rem; margin-left: 4rem;" type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="Enter product description"></textarea>
                    </div>
                    </div>
                    <!-- /.box-body -->

            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="tab_2">
                                <!-- form start -->

                    <div class="box-body">
                    <div class="form-group" >
                        <label for="exampleInputPassword1">Product Slug</label>
                        <input  type="text" name="slug" class="form-control " style="height: 5rem; margin-left: 4rem;" id="exampleInputPassword1" placeholder="Enter product slug">
                    </div>
                    <div class="form-group" >
                        <label for="exampleInputPassword1">Meta Title</label>
                        <input  type="text" name="meta_title" class="form-control " style="height: 5rem; margin-left: 4rem;" id="exampleInputPassword1" placeholder="Enter meta title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea style="resize: none; width: 100%; height: 15rem; margin-left: 4rem;" type="text" name="meta_description" class="form-control" id="exampleInputPassword1" placeholder="Enter meta description"></textarea>
                    </div>
                    </div>
                    <!-- /.box-body -->

            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="tab_3">
                             

                    <div class="box-body">

                    <div class="form-group" >
                        <label for="exampleInputPassword1">Product Price</label>
                        <input  type="text" name="price" class="form-control " style="height: 5rem; margin-left: 4rem;" id="exampleInputPassword1" placeholder="Enter product price">
                    </div>

                    <div class="form-group" >
                        <label for="exampleInputPassword1">Percentage discount in price if applicable</label>
                        <input  type="text" name="disprice" class="form-control " style="height: 5rem; margin-left: 4rem;" id="exampleInputPassword1" placeholder="Enter product price">
                    </div>

                    <div class="form-group" >
                        <label for="exampleInputPassword1">Product quantity</label>
                        <input  type="text" name="quantity" class="form-control " style="height: 5rem; margin-left: 4rem;" id="exampleInputPassword1" placeholder="Enter product price">
                    </div>
                    
                    </div>
                    <!-- /.box-body -->
                     <div class="form-group">
                        <input type="file" style=" width: 50%; height: 5rem; margin-left: 4rem; box-sixing: border-box;" name="image" id="exampleInputFile">
                        <p class="help-block">Create category using the form</p>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                <form>
            </div>
            <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
  </div>
@endsection 