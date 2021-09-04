@extends('layouts.admin')

@section('title', ' جميع المستفيدين ')


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
              {{-- <form class='row' action="{{url('/exchange/search')}}" method="POST">
                @csrf
                  <div class='col-sm-3'>
                     <input type='date' value='{{date('d-m-Y')}}'class="form-control" placeholder="enter your search" name="q"/>
                  </div>
                  <div class='col-sm-3'>
                     <input type='date' value='{{date('d-m-Y')}}'class="form-control" placeholder="enter your search" name="q"/>
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
                    <th>رقم الملف</th>
                    <th>رقم الهوية</th>
                    <th>السلة</th>
                    <th>الكمية المصروفة</th>
                    <th>تاريخ الصرف</th>
                    <th>ملاحظات</th>
                    <th>الإجراءات</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($exchanges as $exchange)
                    <tr>
                        <th>{{$exchange->id ?? ""}}</th>
                        <th>{{$exchange->beneficiarie->name ?? "محذوف"}}</th>
                        <th>{{$exchange->beneficiarie->file_no ?? "محذوف"}}</th>
                        <th>{{$exchange->beneficiarie->id_number ?? "محذوف"}}</th>
                        <th>{{$exchange->basket->name ?? "محذوف"}}</th>
                        <td width="5%">{{$exchange->quantity ?? ""}}</td>
                        <td>{{$exchange->created_at->format('d-m-Y') ?? ""}}</td>
                        <td>{{$exchange->note ?? ""}}</td>
                        	<td>   
                              <a href="{{route('exchange.edit' , $exchange->id )}}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
                              <a href="{{route('exchange.delete' , $exchange->id)}}" onclick='return confirm("Are you sure dude?")' class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>الإسم</th>
                    <th>رقم الملف</th>
                    <th>رقم الهوية</th>
                    <th>السلة</th>
                    <th>الكمية المصروفة</th>
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