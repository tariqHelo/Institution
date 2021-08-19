@extends('layouts.admin')

@section('title', 'جميع المستودعات')


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
               <a type="button" class="btn btn-primary" href="{{ route('repository.create') }}">إضافة <i class="fa fa-plus"></i> </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>#</th>
                  <th>إسم المستودع</th>
                  {{-- <th> عدد السلال</th> --}}
                  <th>الإجراءات</th>

                  </tr>
                </thead>

                <tbody>
                  @foreach($repositoreis as $repository)
                    <tr>
                        <th>{{$repository->id}}</th>
                        <th>{{$repository->name}}</th>
                        {{-- <td>{{$repository->basket_id->coun}}</td> --}}
                        <td>   
                              <a href="{{route('repository.edit' , $repository->id )}}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
                              <a href="{{route('repository.show' , $repository->id )}}" class="btn btn-success btn-sm"><i class='fa fa-eye'></i></a>
                              <a href="{{route('repository.delete' , $repository->id )}}" onclick='return confirm("Are you sure dude?")' class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                  <th>#</th>
                  <th>إسم المستودع</th>
                  {{-- <th> عدد السلال</th> --}}
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