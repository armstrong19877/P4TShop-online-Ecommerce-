@extends('backend.layout.app')
@section('title', 'Products')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>P4T|Shop</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
      @if(session('success'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif
    </section> 
    <!--header end here-->

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Bordered Table</h3>
        </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th style="width: 40px">Category Name</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                <thead>
                <tbody>
                @foreach ($products as $product)
                  <tr>
                    <td style="align-item: center;">{{$product->id}}</td>
                    <td style="align-item: center; padding-left: 5rem;">{{$product->name}}</td>
                    <td style="align-item: center; padding-left: 5rem;">{{$product->price}}</td>
                    
                    <td  style="align-item: center; padding-left: 5rem; width: 20%;"width="120px">{{$product->category->name}}</td>
                   
                    <td style="align-item: center; padding-left: 5rem;"><img src="/images/backend/categories/{{$product->image}}" width="150px" height="150px"/></td>
                    <td width="20%;">
                      <form action="{{url('admin/product/'.$product->id.'/delete')}}" method="Post">
                          @csrf
                          @method('DELETE')
                          <a href="{{url('admin/product/'.$product->id.'/view')}}" class="btn btn-info">View</a>
                          <a href="{{url('admin/product/'.$product->id.'/edit')}}" class="btn btn-primary">Edit</a>
                          <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                      </td>
                  </tr>
                @endforeach  
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                @foreach ($products as $product)
                <li><a href="#">{{ $product->name }}</a></li>
                @endforeach
                {{ $products->links() }}
              </ul>
            </div>
      </div>
        
          <!-- /.box -->
    </section>
  </div>
@endsection 