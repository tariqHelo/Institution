@extends('layouts.admin')
@section('title', 'جميع المستخدمين')

@section('content')
@include('shared.msg')
    <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header">
               <a type="button" class="btn btn-success" href="{{ route('users.create') }}">إضافة مستخدم  <i class="fa fa-plus"></i> </a>
            </div>
              <div class="card-header">
                <h3 class="card-title"></h3>

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
                       <th>
                           #
                        </th>
                        <th>
                            الإسم
                        </th>
                        <th>
                            الإيميل
                        </th>
                        <th>
                            صلاحية المستودع
                        </th>
                        <th>
                          الرولز
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach($users as $key => $user)
                        <tr data-entry-id="{{ $user->id }}">
                            <th>
                                {{ $user->id ?? '' }}
                            </th>
                            <td>
                                {{ $user->name ?? '' }}
                            </td>
                            <td>
                                {{ $user->email ?? '' }}
                            </td>
                             <td>
                                {{ $user->repository_id?? '' }}
                            </td>
                            <td>
                                @foreach($user->roles as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{-- @can('user_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('users.show', $user->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan --}}

                                @can('user_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('users.edit', $user->id) }}">
                                        تعديل
                                    </a>
                                @endcan

                                @can('user_delete')
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="حذف">
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
            <!-- /.card -->
          </div>
        </div>
</div>



@endsection

