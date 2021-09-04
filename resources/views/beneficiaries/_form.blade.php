
    <div class="card-body">
                 <div class="form-group">
                    <label> رقم الملف </label>
                    <input type="string" class="form-control @error('file_no') is-invalid @enderror" name="file_no"  placeholder="رقم الملف" value="{{ old('name' , $beneficiarie->file_no) }}">
                     @error('file_no')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                 <div class="form-group">
                    <label>إسم المستفيد </label>
                    <input type="string" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder=" إسم المستفيد" value="{{ old('name' , $beneficiarie->name) }}">
                     @error('name')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label>فئة الملف </label>
                    <input type="string" class="form-control @error('calss') is-invalid @enderror" name="calss"  placeholder="فئة الملف" value="{{ old('calss' , $beneficiarie->calss) }}">
                     @error('calss')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                 <div class="form-group">
                    <label>رقم الهوية </label>
                    <input type="string" class="form-control @error('id_number') is-invalid @enderror" name="id_number"  placeholder="رقم الهوية " value="{{ old('id_number' , $beneficiarie->id_number) }}">
                     @error('id_number')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label>رقم الجوال </label>
                    <input type="string" class="form-control @error('phone') is-invalid @enderror" name="phone"  placeholder="رقم الجوال" value="{{ old('phone' , $beneficiarie->phone) }}">
                     @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                 <div class="form-group">
                    <label>القرية - الحي </label>
                    <input type="string" class="form-control @error('area') is-invalid @enderror" name="area"  placeholder="القرية - الحي" value="{{ old('area' , $beneficiarie->area) }}">
                     @error('area')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
      </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">{{$button}}</button>
         <a href="{{route('beneficiaries.index')}}" class="btn btn-danger" type="button"> إلغاء</a>
        </div>