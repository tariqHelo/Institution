@extends('layouts.admin')

@section('title', 'جميع السلال')


@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">car</li>
</ol>
@endsection

@section('content')
        @include('shared.msg')

          <div class="card">
            <div class="card-header">
               <a type="button" class="btn btn-primary" href="{{ route('basket.create') }}">إضافة <i class="fa fa-plus"></i> </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>#</th>
                  <th>إسم السلة</th>
                  <th>الكمية المتبقية</th>
                  <th>الكمية المدخلة</th>
                  <th>الكمية المصروفة</th>
                  <th>السعر</th>
                  <th>الحالة</th>
                  <th>الإجراءات</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($baskets as $basket)
                    <tr>
                         <th>{{ $basket->id }}</th>
                         <th>{{ $basket->name }}</th>
                         <td>{{ $basket->o_qty - $basket->total()}}</td>
                         <td>{{ $basket->o_qty }}</td>
                         <td>{{ $basket->total() }}</td>
                         <td>{{ $basket->price }}</td>
                          <td>
                              @if($basket->status=='active')
                                  <span class="btn btn-success btn-sm">مفعل</span>
                              @elseif($basket->status=='draft')
                                  <span class="btn btn-danger btn-sm">غير مفعل</span>
                              @endif
                          </td>
                        	<td>   
                              <a href="{{route('basket.edit' , $basket->id )}}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
                              @if($basket->file)
                               <a href="/uploads/{{ $basket->file }}" target="_blank" class="btn btn-success btn-sm"><i class='fa fa-eye'></i></a>
                              @endif
                              <a href="{{route('basket.delete' , $basket->id )}}" onclick='return confirm("Are you sure dude?")' class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                  <th>#</th>
                  <th>إسم السلة</th>
                  <th>الكمية المتبقية</th>
                  <th>الكمية المدخلة</th>
                  <th>الكمية المصروفة</th>
                  <th>السعر</th>
                  <th>الحالة</th>
                  <th>الإجراءات</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection