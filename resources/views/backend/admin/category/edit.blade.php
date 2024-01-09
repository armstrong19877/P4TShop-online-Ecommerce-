@extends('backend.layout.app')
@section('title', 'Edit Category')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- form start -->
                <form role="form" action="{{url('admin/category/'.$category->id.'/update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                            <input value="{{$category->name}}" type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter category">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Slug</label>
                            <input value="{{$category->slug}}" type="text" name="slug" class="form-control" id="exampleInputPassword1" placeholder="Enter slug">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea value="{{$category->description}}" style="resize: none; width: 100%; height: 10rem;" type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="Enter slug"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" name="image" id="exampleInputFile">
                            <p class="help-block">Create category using the form</p>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer" >
                        <button style="margin-right:4rem;" type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{url('admin/category')}}" class="btn btn-info">Back</a>
                    </div>
                </form>

  </div>
@endsection 