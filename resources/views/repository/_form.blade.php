
    <div class="card-body">
                  <div class="form-group">
                    <label> إسم المستودع  </label>
                    <input type="string" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder=" إسم المستودع" value="{{ old('name' , $repository->name) }}">
                      @error('name')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label class="required" for="permissions">إختيار السلال</label>
                    <select class="select2 form-control  {{ $errors->has('baskets') ? 'is-invalid' : '' }}" name="baskets[]" id="baskets" multiple required>
                        @foreach($baskets as $id => $basket)
                        <option value="{{ $id }}" {{ (in_array($id, old('baskets', [])) || $repository->baskets->contains($id)) ? 'selected' : '' }}>{{ $basket }}</option>
                        @endforeach
                    </select>
                </div>
      </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">{{$button}}</button>
         <a href="{{route('repository.index')}}" class="btn btn-danger" type="button"> إلغاء</a>
        </div>