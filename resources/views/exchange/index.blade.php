@extends('layouts.admin')

@section('title', 'جميع المصروفات')


@section('breadcrumb')
{{-- <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">car</li>
</ol> --}}
@endsection

@section('content')
        @include('shared.msg')

          <div class="card">
            <div class="card-header">
               <a type="button" class="btn btn-primary" href="{{ route('exchange.create') }}">إضافة <i class="fa fa-plus"></i> </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>الإسم</th>
                    <th>إسم السلة</th>
                    <th>الكمية المصروفة</th>
                    <th>ملاحظات</th>
                    <th>الإجراءات</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($exchanges as $exchange)
                    <tr>
                        <th>{{$exchange->id}}</th>
                        <th>{{$exchange->name}}</th>
                        <th>{{$exchange->basket->name}}</th>
                        <td>{{$exchange->quantity}}</td>
                        <td>{{$exchange->note}}</td>
                        	<td>   
                              <a href="{{route('exchange.edit' , $exchange->id )}}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
                              <a href="" onclick='return confirm("Are you sure dude?")' class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>الإسم</th>
                    <th>إسم السلة</th>
                    <th>الكمية المصروفة</th>
                    <th>ملاحظات</th>
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