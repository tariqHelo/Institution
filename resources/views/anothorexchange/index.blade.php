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
              {{-- <form class='row' action="{{ route('q')}}" method="POST">
                @csrf
                  <div class='col-sm-3'>
                     <input type='date' value=''class="form-control" placeholder="enter your search" name="q"/>
                  </div>
                  <div class='col-sm-3'>
                     <input type='date' value=''class="form-control" placeholder="enter your search" name="q"/>
                  </div> 
                  <div class="col-2">
                     <button type='submit' class='btn btn-primary'><i class="fa fa-search"></i>search</button></div> 
                  </div>
              </form> --}}
            
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
                        <td>{{$anothor->created_at->format('d-m-Y') ?? ""}}</td>
                        <td>{{$anothor->note ?? ""}}</td>
                        <td>   
                          <a href="{{route('anothor.edit' , $anothor->id )}}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
                          <form action="{{ route('anothor.destroy', $anothor->id) }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <button type="submit"  onclick='return confirm("Are you sure dude?")' class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                          </form>
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

@section('script')

  <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('assets/admin/plugins/jszip/jszip.min.js')}}"></script>
  <script src="{{ asset('assets/admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
  <script src="{{ asset('assets/admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "excel", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection
@endsection