@extends('layouts.admin')

@section('title', ' جميع المستفيدين لجهة أخري ')


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
               <a type="button" class="btn btn-primary" href="{{ route('anothor.create') }}">إضافة <i class="fa fa-plus"></i> </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>الإسم</th>
                    <th>رقم الهوية</th>
                    <th>العنوان</th>
                    <th>إسم السلة</th>
                    <th>الكمية </th>
                     <th>تاريخ الصرف</th>
                    <th>ملاحظات</th>
                    <th>الإجراءات</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($anothors as $anothor)
                    <tr>
                        <th>{{$anothor->id ?? ""}}</th>
                        <th>{{$anothor->name ?? "محذوف"}}</th>
                        <td>{{$anothor->id_number ?? "محذوف"}}</th>
                        <td>{{$anothor->address ?? "محذوف"}}</th>
                        <td>{{$anothor->basket->name ?? ""}}</td>
                        <td width="5%">{{$anothor->quantity ?? ""}}</td>
                        <td>{{$anothor->created_at ?? ""}}</td>
                        <td>{{$anothor->note ?? ""}}</td>
                        	<td>   
                              <a href="{{route('anothor.edit' , $anothor->id )}}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
                              <a href="" onclick='return confirm("Are you sure dude?")' class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>الإسم</th>
                    <th>رقم الهوية</th>
                    <th>العنوان</th>
                    <th>إسم السلة</th>
                    <th>الكمية </th>
                     <th>تاريخ الصرف</th>
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