@extends('layouts.admin')
@section('content')
@include('shared.msg')

     <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title-rtl">إضافة رول</h3>
            </div>

    <div class="card-body">
        <form method="POST" action="{{ route('roles.store') }}" enctype="multipart/form-data">
            @csrf
             @include('admin.roles._form',[
                  'button' => "إضافة"
                ])
            </div>
        </form>
    </div>

@endsection