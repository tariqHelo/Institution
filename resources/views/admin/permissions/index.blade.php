@extends('layouts.admin')
@section('title', 'جميع الصلاحيات')

@section('content')
@include('shared.msg')


 <div class="card">
             <div class="card-header">
               <a type="button" class="btn btn-success" href="{{ route('permissions.create') }}">إضافة صلاحية  <i class="fa fa-plus"></i> </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th>
                            id
                    </th>
                    <th>
                            title
                    </th>
                    <th>
                            Status
                    </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $key => $permission)
                        <tr class="odd gradeX">
                            <th>
                                {{ $permission->id ?? '' }}
                            </th>
                            <th>
                                {{ $permission->title ?? '' }}

                            </th>
                            <td>
                                {{-- @can('permission_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('permissions.show', $permission->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan --}}
                                    <a class="btn btn-xs btn-info" href="{{ route('permissions.edit', $permission->id) }}">
                                        تعديل
                                    </a>
                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="حذف">
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
 </div>
@endsection