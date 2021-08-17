@extends('layouts.admin')

@section('title', ' جميع السلال الخاصة بالمستودعات')


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
               {{-- <a type="button" class="btn btn-primary" href="{{ route('repository.create') }}">إضافة <i class="fa fa-plus"></i> </a> --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>#</th>
                  <th>إسم السلة</th>
                  <th>الكمية</th>
                  <th>الإجراءات</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($baskets as $basket)
                    <tr>
                        <th>{{$basket->id}}</th>
                        <th>{{$basket->name}}</th>
                        <td>{{$basket->quantity}}</td>
                        <td>   
                              <a href="{{route('basket.edit' , $basket->id )}}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
                              <a href="" onclick='return confirm("Are you sure dude?")' class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                  <th>إسم السلة</th>
                  <th>الكمية</th>
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