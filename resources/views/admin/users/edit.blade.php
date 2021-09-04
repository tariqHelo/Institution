@extends('layouts.admin')
@section('title', '')

@section('content')
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h5 class="card-title-rtl">تعديل مستخدم </h5>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('users.update' , $user->id)}}" method="POST" class="form-horizontal">
                @csrf
                @method('PATCH')
                 @include('admin.users._form', [
                    'button' => 'تعديل'
                ])
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

          </div>
@endsection






