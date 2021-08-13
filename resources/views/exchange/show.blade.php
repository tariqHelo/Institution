@extends('layouts.admin')

@section('title', 'جميع الدول')


@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Country</li>
</ol>
@endsection


@section('content')
    @include('shared.msg')

          <div class="card">
            <div class="card-header">
               <a type="button" class="btn btn-primary" href="{{ route('country.create') }}">إضافة <i class="fa fa-plus"></i> </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>id</th>
                  <th>إسم المدينة </th>
                  <th>الإسم المدينة بالإنجليزي</th>
                  <th>الحالة</th>
                  <th>الإجراءات</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($cities as $id => $city )
                    <tr>
                         <th>{{$city->id}}</th>
                        <td>{{$city->name}}</td>
                        <td>{{$city->english_name}}
                        </td>
                        <td>
                              @if($city->status=='active')
                                  <span class="btn btn-success btn-sm">مفعل</span>
                              @elseif($city->status=='draft')
                                  <span class="btn btn-warning btn-sm">غير مفعل</span>
                              @else($order->order_status_id==3)
                                  <span class="btn btn-danger btn-sm">مخفي</span>
                              @endif
                          </td>
                        	<td>   
                              <a href="" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
                              <a href="" class="btn btn-success btn-sm"><i class='fa fa-eye'></i></a>
                              <a href="" onclick='return confirm("Are you sure dude?")' class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></a>
                        </td>
                    </tr>
                  @endforeach
                 
                </tbody>
                <tfoot>
                <tr>
                   <th>id</th>
                  <th>إسم المدينة </th>
                  <th>الإسم المدينة بالإنجليزي</th>
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