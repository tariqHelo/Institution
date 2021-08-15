@extends('layouts.admin')

@section('title', 'جميع المستفيدين')


@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">car</li>
</ol>
@endsection

@section('content')
        @include('shared.msg')

          <div class="card">
            <form action="{{route('beneficiaries.store')}}" method="POST" enctype="multipart/form-data" class="card card-danger">
              @csrf
                <div class="card-header">
                  <h3 class="card-title-rtl">تحميل ملف الإكسل</h3>
                </div>
                <div class="card-body">
                  <div class="row">
                     <div class="col-sm-10">
                      <input type="file" name="file" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
               <div class="card-body">
                  <button type="submit" class="btn btn-primary">إضافة <i class="fas fa-upload"></i> </button>
                </div>
            </form>
                

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  {{-- <th>#</th> --}}
                  <th>رقم الملف</th>
                  <th>الإسم</th>
                  <th>فئة الملف</th>
                  <th>رقم الهوية</th>
                  <th>رقم الجوال</th>
                  <th>القرية - الحي</th>
                  <th>الإجراءات</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($beneficiaries as $beneficiarie)
                    <tr>
                        {{-- <th>{{$beneficiarie->id}}</th> --}}
                        <th>{{$beneficiarie->file_no}}</th>
                        <td>{{$beneficiarie->name}}</td>
                        <td>{{$beneficiarie->calss}}</td>
                        <td>{{$beneficiarie->id_number}}</td>
                        <td>{{$beneficiarie->phone}}</td>
                        <td>{{$beneficiarie->area}}</td>
                        	<td>   
                              <a href="{{route('beneficiaries.edit' , $beneficiarie->id )}}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
                              <a href="" onclick='return confirm("Are you sure dude?")' class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                  {{-- <th>#</th> --}}
                  <th>رقم الملف</th>
                  <th>الإسم</th>
                  <th>فئة الملف</th>
                  <th>رقم الهوية</th>
                  <th>رقم الجوال</th>
                  <th>القرية - الحي</th>
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
      "buttons": ["copy", "csv", "excel", "print", "colvis"]
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