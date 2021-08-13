@extends('layouts.admin')

@section('title', '')


@section('breadcrumb')
{{-- <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Country</li>
</ol> --}}
@endsection
            
    
@section('content')

<div class="col-md-12">

              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach($errors->all() as $message)
                      <li>{{ $message }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title-rtl">إضافة بيانات الطلب</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('order.store')}}" method="POST">
                @csrf
                @include('admin.orders._form',[
                  'button' => "إضافة"
                ])
              </form>
            </div>
            <!-- /.card -->
         </div>
@endsection