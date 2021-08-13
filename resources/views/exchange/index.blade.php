@extends('layouts.admin')

@section('title', 'جميع الطلبات')


@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Country</li>
</ol>
@endsection


@section('content')
    @include('shared.msg')
      <div class="row">
          <div class="col-12">
            <div class="card">
               <div class="card-header">
               <a type="button" class="btn btn-primary" href="">إضافة <i class="fa fa-plus"></i> </a>
            </div>
              <div class="card-header">
                <h3 class="card-title">جميع الطلبات </h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                    
                  <th width="10%">رقم الطلب</th>
                  <th width="15%">التاريخ</th>
                  <th width="10%">النوع </th>
                  <th>المرسل</th>
                  <th>المستلم</th>
                  <th>الجهة</th>
                  <th>الحالة</th>
                  <th>الإجراءات</th>
                  <th>العرض</th>
                  <th>ملاحظات</th>
                  <th>إلغاء</th>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- @foreach ($orders as $order)
                     <tr>
                      <td>{{$order->id}}</td>
                      <td>{{$order->received_date}}</td>
                      <td>{{$order->service_id}}</td>
                      <td>{{$order->sender}}</td>
                      <td>{{$order->recipient_name}}</td>
                      <td>{{$order->received_date}}</td>
                      <td>{{$order->service_id}}</td>
                      <td>{{$order->sender}}</td>
                      <td>{{$order->recipient_name}}</td>
                    </tr> 
                    @endforeach --}}
                    
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
