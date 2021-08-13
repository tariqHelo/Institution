
    <div class="card-body">
                  <div class="form-group">
                    <label> إسم السلة  </label>
                    <input type="string" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder=" إسم السلة" value="{{ old('name') }}">
                      @error('name')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label>الكمية </label>
                    <input type="string" class="form-control @error('qty') is-invalid @enderror" name="qty"  placeholder=" الكمية" value="{{ old('qty') }}">
                     @error('qty')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label>سعر السلة  </label>
                    <input type="string" class="form-control @error('price') is-invalid @enderror" name="price"  placeholder="سعر السلة" value="{{ old('price') }}">
                      @error('price')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
            
                    <div class="form-group">
                        <label for="status">يستحق الصرف</label>
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status-active" value="active" @if(old('status') == 'active') checked @endif>
                                <label class="form-check-label" for="status-active">
                                    قابل 
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status-draft" value="draft" @if(old('status') == 'draft') checked @endif >
                                <label class="form-check-label" for="status-draft">
                                     غير قابل
                                </label>
                            </div>
                            @error('status')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                        </div>
                        
                    </div>
      </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">{{$button}}</button>
         <a href="{{route('basket.index')}}" class="btn btn-danger" type="button"> إلغاء</a>
        </div>