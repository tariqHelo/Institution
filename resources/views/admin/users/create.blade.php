@extends('layouts.admin')
@section('title', '')

@section('content')
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h5 class="card-title-rtl">إضافة مستخدم جديد</h5>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('users.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                 @include('admin.users._form', [
                    'button' => 'إضافة'
                ])
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

          </div>
@endsection






