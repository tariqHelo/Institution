@extends('layouts.admin')

@section('title', '')

@section('css')
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  
@endsection

@section('breadcrumb')
{{-- <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Country</li>
</ol> --}}
@endsection
            
    
@section('content')

<div class="col-md-6">
    <div class="card">
              <div class="card-header">
                <h5 class="card-title-rtl">الكميات المتاحة في السلال </h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>إسم السلة </th>
                      <th>الكمية المتوفرة</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($basketss as $basket)
                    <tr>
                         <th>{{ $basket->id }}</th>
                         <th>{{ $basket->name }}</th>
                         <td>{{ $basket->o_qty - $basket->total()}}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
              @include('shared.msg')
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title-rtl">إضافة بيانات المستفيد</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('exchange.store')}}" method="POST">
                @csrf
                @include('exchange._form',[
                  'button' => "إضافة"
                ])
              </form>
            </div>
            <!-- /.card -->
         </div>
@endsection

@section('script')
<script>

// $(".js-example-tags").select2({
//   tags: true
// });
</script>
@endsection