@extends('layouts.admin')

@section('title', '')


@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Products</li>
</ol>
@endsection



@section('content')
    <!-- left column -->
          <div class="col-md-12">
             @include('shared.msg')

            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title-rtl">إضافة سلة</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{route('basket.store')}}" method="POST">
                @csrf
                 @include('basket._form', [
                    'button' => 'إضافة'
                ])
              </form>
            </div>
            <!-- /.card -->
         </div>
@endsection