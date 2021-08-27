
    <div class="card-body">
                  <div class="form-group">
                    <label> إسم السلة  </label>
                    <input type="string" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder=" إسم السلة" value="{{ old('name' , $basket->name) }}">
                      @error('name')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label>الكمية </label>
                    <input type="string" class="form-control @error('o_qty') is-invalid @enderror" name="o_qty"  placeholder=" الكمية" value="{{ old('o_qty' , $basket->o_qty) }}">
                     @error('o_qty')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label>سعر السلة  </label>
                    <input type="string" class="form-control @error('price') is-invalid @enderror" name="price"  placeholder="سعر السلة" value="{{ old('price', $basket->price) }}">
                      @error('price')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label>مصدرها   </label>
                    <input type="string" class="form-control @error('source') is-invalid @enderror" name="source"  placeholder="مصدرها" value="{{ old('source', $basket->source) }}">
                      @error('source')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label>المرفقات   </label>
                    <input type="file" class="form-control @error('file') is-invalid @enderror" name="file"  placeholder="المرفقات" value="{{ old('file', $basket->file) }}">
                      @error('file')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                      {{-- @if($basket->file)
                        <img src="{{asset("/uploads".$basket->file)}}" width='240' class='img-thumbnail'>
                      @endif --}}
                  </div>
            
                    <div class="form-group">
                        <label for="status">يستحق الصرف</label>
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status-active" value="active" @if(old('status',$basket->status) == 'active') checked @endif>
                                <label class="form-check-label" for="status-active">
                                    قابل 
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status-draft" value="draft" @if(old('status',$basket->status) == 'draft') checked @endif>
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