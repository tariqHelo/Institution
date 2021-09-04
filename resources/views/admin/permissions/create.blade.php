@extends('layouts.admin')
@section('title', '')

@section('content')
@include('shared.msg')

      <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title-rtl">إضافة صلاحية</h3>
            </div>

    <div class="card-body">
        <form method="POST" action="{{ route('permissions.store') }}" enctype="multipart/form-data">
            @csrf
             @include('admin.permissions._form',[
                  'button' => "إضافة"
                ])
            </div>
        </form>
    </div>



@endsection