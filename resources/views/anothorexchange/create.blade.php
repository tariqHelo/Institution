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

<div class="col-md-12">
              @include('shared.msg')
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title-rtl">إضافة بيانات المستفيد</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('anothor.store')}}" method="POST">
                @csrf
                @include('anothorexchange._form',[
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