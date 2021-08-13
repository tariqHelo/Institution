@extends('layouts.admin')
@section('content')
@include('shared.msg')

     <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title-rtl">تعديل رول</h3>
            </div>

    <div class="card-body">
        <form method="POST" action="{{ route('roles.update' , $role->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
             @include('admin.roles._form',[
                  'button' => "تعديل"
                ])
            </div>
        </form>
    </div>

@endsection