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
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email ) }}" placeholder="الإيميل">
                      @error('email')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label"> الصورة الشخصية</label>
                    <div class="col-sm-10">
                      <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"placeholder="الصورة الشخصية">
                      @error('image')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">رقم الهاتف المتحرك</label>
                    <div class="col-sm-10">
                      <input type="string" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $employe->phone ) }}" placeholder="رقم الهاتف المتحرك">
                      @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label"> تاريخ بدء العمل</label>
                    <div class="col-sm-10">
                      <input type="string" name="work_start" class="form-control @error('work_start') is-invalid @enderror" value="{{ old('work_start', $employe->work_start ) }}" placeholder="تاريخ بدء العمل">
                      @error('work_start')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">الجنسية</label>
                    <div class="col-sm-10">
                      <input type="string" name="nationality" class="form-control @error('nationality') is-invalid @enderror" value="{{ old('nationality', $employe->nationality ) }}" placeholder="الجنسية">
                      @error('nationality')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">رقم الهوية</label>
                    <div class="col-sm-10">
                      <input type="string" name="id_number" class="form-control @error('id_number') is-invalid @enderror" value="{{ old('id_number', $employe->id_number ) }}" placeholder="رقم الهوية">
                      @error('id_number')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">تاريخ انتهاء الهوية</label>
                    <div class="col-sm-10">
                      <input type="date" name="id_expiry" class="form-control @error('id_expiry') is-invalid @enderror" value="{{ old('id_expiry', $employe->id_expiry ) }}" placeholder="تاريخ انتهاء الهوية">
                      @error('id_expiry')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">صورة الهوية</label>
                    <div class="col-sm-10">
                      <input type="file" name="id_image" class="form-control @error('id_image') is-invalid @enderror" placeholder="صورة الهوية">
                      @error('id_image')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">رقم الجواز</label>
                    <div class="col-sm-10">
                      <input type="string" name="passport" class="form-control @error('passport') is-invalid @enderror" value="{{ old('passport', $employe->passport ) }}" placeholder="رقم الجواز">
                      @error('passport')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label"> تاريخ انتهاء الجواز</label>
                    <div class="col-sm-10">
                      <input type="date" name="passport_expiry" class="form-control @error('passport_expiry') is-invalid @enderror" value="{{ old('passport_expiry', $employe->passport_expiry ) }}" placeholder="تاريخ انتهاء الجواز">
                      @error('passport_expiry')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label"> صورة الجواز</label>
                    <div class="col-sm-10">
                      <input type="file" name="passport_image" class="form-control @error('passport_image') is-invalid @enderror" placeholder=" صورة الجواز">
                      @error('passport_image')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                   
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">تاريخ إنتهاء الإقامة</label>
                    <div class="col-sm-10">
                      <input type="date" name="residence_expiry" class="form-control @error('residence_expiry') is-invalid @enderror" value="{{ old('residence_expiry', $employe->residence_expiry ) }}" placeholder="تاريخ إنتهاء الإقامة">
                      @error('residence_expiry')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">صورة الإقامة</label>
                    <div class="col-sm-10">
                      <input type="file" name="residence_image" class="form-control @error('residence_image') is-invalid @enderror" placeholder="صورة الإقامة">
                      @error('residence_image')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  
 
                   
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">رقم رخصة القيادة</label>
                    <div class="col-sm-10">
                      <input type="string" name="license" class="form-control @error('license') is-invalid @enderror" value="{{ old('license', $employe->license ) }}" placeholder="رقم رخصة القيادة">
                      @error('license')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">صورة الرخصة</label>
                    <div class="col-sm-10">
                      <input type="file" name="license_image" class="form-control @error('license_image') is-invalid @enderror"placeholder="صورة الرخصة">
                      @error('license_image')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">تاريخ انتهاء رخصة القيادة</label>
                    <div class="col-sm-10">
                      <input type="date" name="license_expiry" class="form-control @error('license_expiry') is-invalid @enderror" value="{{ old('license_expiry', $employe->license_expiry ) }}" placeholder="تاريخ انتهاء رخصة القيادة">
                      @error('license_expiry')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 control-label">كلمة المرور</label>
                    <div class="col-sm-10">
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password', $user->password ) }}" id="inputPassword3" placeholder="كلمة المرور">
                      @error('password')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 control-label">الرولز</label>
                    <div class="col-sm-10">
                     <select class="form-control select2" name="roles[]" multiple required>
                         @foreach($roles as $id => $roles)
                          <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $roles }}</option>
                        @endforeach
                        @error('roles[]')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </select>   
                    </div>
                  </div>
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                   <button type="submit" class="btn btn-primary">{{$button}}</button>
                    <a href="{{route('users.index')}}" class="btn btn-danger" type="button"> إلغاء</a>
                </div>