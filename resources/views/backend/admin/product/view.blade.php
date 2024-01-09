@extends('backend.layout.app')
@section('title', 'Show Product')
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
        <div class="card d-flex" style="width: 18rem;">
            <img style="width: 30rem; height: 30rem;" class="card-img-top" src="/images/backend/categories/{{$product->image}}" alt="Card image cap">
                <div class="card-body" style="font-size:2rem;" >
                    <p class="card-text">Name: {{$product->name}}</p>
                    <p class="card-text">Slug: {{$product->price}}</p>
                    <p class="card-text">Description: {{$product->quantity}}</p>
                    <a href="{{url('admin/product')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
      </div>
    </section>
  </div>
@endsection 