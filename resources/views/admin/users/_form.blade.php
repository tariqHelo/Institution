<div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">الإسم</label>
                    <div class="col-sm-10">
                      <input type="string" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name ) }}" placeholder="الإسم">
                      @error('name')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">الإيميل</label>
                    <div class="col-sm-10">
                      <input type="string" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email ) }}" placeholder="الإسم">
                      @error('email')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">كلمة المرور</label>
                    <div class="col-sm-10">
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  placeholder="كلمة المرور">
                      @error('password')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">تأكيد كلمة المرور</label>
                    <div class="col-sm-10">
                      <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror"  placeholder="تأكيد كلمة المرور">
                      @error('password')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">إختيار الرولز</label>
                    <div class="col-sm-10">
                      <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                        @foreach($roles as $id => $roles)
                            <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $roles }}</option>
                        @endforeach
                    </select>
                    </div>
                  </div>

                 <!-- /.card-body -->
                <div class="card-footer">
                   <button type="submit" class="btn btn-primary">{{$button}}</button>
                    <a href="{{route('users.index')}}" class="btn btn-danger" type="button"> إلغاء</a>
                </div>
   </div>             