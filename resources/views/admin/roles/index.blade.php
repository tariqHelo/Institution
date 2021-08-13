@extends('layouts.admin')
@section('title', 'جميع الرولز')

@section('content')
@include('shared.msg')


          <div class="card">
              <div class="card-header">
                <a type="button" class="btn btn-success" href="{{ route('roles.create') }}">إضافة رولز  <i class="fa fa-plus"></i> </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-stripedtable table-hover">
                  <thead>
                    <tr>
                       
                        <th>
 #                        </th>
                        <th>
                          الرولز
                        </th>
                        <th>
                          الصلاحيات
                        </th>
                        <th>
                            الإجراءات
                        </th>
                    </tr>
                  </thead>
                  <tbody>
                       @foreach($roles as $key => $role)
                        <tr>
                          
                            <td>
                                {{ $role->id ?? '' }}
                            </td>
                            <td>
                                {{ $role->title ?? '' }}
                            </td>
                            <td>
                                @foreach($role->permissions as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{-- @can('role_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('roles.show', $role->id) }}">
                                        مشاهدة
                                    </a>
                                @endcan --}}
                                @can('role_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('roles.edit', $role->id) }}">
                                        تعديل
                                    </a>
                                @endcan
                                @can('role_delete')
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('حذف') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
        </div>
        
</div>



@endsection

