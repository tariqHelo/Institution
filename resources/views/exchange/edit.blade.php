@extends('layouts.admin')

@section('title'  , 'صفحة التعديل ')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Products</li>
</ol>
@endsection

@section('content')
    <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title-rtl">التعديل دولة</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('country.update' , $country->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">إسم البلد </label>
                    <input type="string" class="form-control" value="{{ old('name', $country->name) }}" name="name"  placeholder="إسم البلد">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">إسم البلد بالإنجليزية</label>
                    <input type="string" class="form-control" value="{{ old('english_name', $country->english_name) }}" name="english_name"  placeholder="إسم البلد بالإنجليزية">
                  </div>
                   <div class="form-group">
                      <label>إضافة المدينة </label>
                      <select class="select2"  name="cities[]" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                        @foreach($cities as $id => $cities)
                           <option value="{{ $id }}" {{ (in_array($id, old('cities', [])) || $country->cities->contains($id)) ? 'selected' : '' }}>{{ $cities }}</option>
                        @endforeach
                      </select>
                   </div>
                    <div class="form-group">
                        <label for="status">الحالة</label>
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status-active" value="active" @if(old('active', $country->status) == 'active') checked @endif>
                                <label class="form-check-label" for="status-active">
                                    فعال
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status-draft" value="draft" @if(old('status', $country->status) == 'draft') checked @endif >
                                <label class="form-check-label" for="status-draft">
                                    غير مفعل
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status-draft" value="hidden" @if(old('status', $country->status) == 'hidden') checked @endif >
                                <label class="form-check-label" for="status-hidden">
                                    مخفي
                                </label>
                            </div>
                        </div>
                        {{-- @error('status')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror --}}
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">تعديل</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
         </div>
@endsection