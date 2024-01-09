@extends('backend.layout.app')
@section('title', 'Category')
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
                      <th>Slug</th>
                      <th style="width: 40px">Description</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                <thead>
                <tbody>
                @foreach ($categories as $category)
                  <tr>
                    <td style="align-item: center;">{{$category->id}}</td>
                    <td style="align-item: center; padding-left: 5rem;">{{$category->name}}</td>
                    <td style="align-item: center; padding-left: 5rem;">{{$category->slug}}</td>
                    <td  style="align-item: center; padding-left: 5rem; width: 20%;"width="120px">{{$category->description}}</td>
                    <td style="align-item: center; padding-left: 5rem;"><img src="/images/backend/categories/{{$category->image}}" height="180px" width="150px"/></td>
                    <td width="20%;">
                      <form action="{{url('admin/category/'.$category->id.'/delete')}}" method="Post">
                          @csrf
                          @method('DELETE')
                          <a href="{{url('admin/category/'.$category->id.'/view')}}" class="btn btn-info">View</a>
                          <a href="{{url('admin/category/'.$category->id.'/edit')}}" class="btn btn-primary">Edit</a>
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
                @foreach ($categories as $category)
                <li><a href="#">{{ $category->name }}</a></li>
                @endforeach
                {{ $categories->links() }}
              </ul>
            </div>
      </div>
        
          <!-- /.box -->
    </section>
  </div>
@endsection 